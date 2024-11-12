const questions = [
  {
      question: "What is 2x + 3 = 7? Solve for x.",
      options: ["1", "2", "3", "4"],
      answer: "2"
  },
  {
      question: "If 5x - 10 = 0, what is x?",
      options: ["1", "2", "3", "4"],
      answer: "2"
  },
  {
      question: "Solve for x: 3(x + 2) = 15.",
      options: ["2", "3", "4", "5"],
      answer: "3"
  },
  {
      question: "What is the value of x in 4x + 4 = 12?",
      options: ["1", "2", "3", "4"],
      answer: "2"
  },
  {
      question: "If x/2 + 5 = 8, what is x?",
      options: ["4", "5", "6", "7"],
      answer: "6"
  }
];

let currentQuestionIndex = 0;
let score = 0;

const questionElement = document.getElementById('question');
const answerOptionsElement = document.getElementById('answer-options');
const submitButton = document.getElementById('submit-btn');
const feedbackElement = document.getElementById('feedback');
const currentQuestionElement = document.getElementById('current-question');
const totalQuestionsElement = document.getElementById('total-questions');
const progressBar = document.getElementById('progress-bar');
const resultElement = document.getElementById('result');
const scoreElement = document.getElementById('score');
const restartButton = document.getElementById('restart-btn');

function startQuiz() {
  currentQuestionIndex = 0;
  score = 0;
  totalQuestionsElement.textContent = questions.length;
  progressBar.value = 0;
  resultElement.style.display = 'none';
  document.getElementById('quiz-container').style.display = 'block';
  showQuestion();
}

function showQuestion() {
  const currentQuestion = questions[currentQuestionIndex];
  questionElement.textContent = currentQuestion.question;
  answerOptionsElement.innerHTML = '';
  feedbackElement.textContent = '';
  currentQuestionElement.textContent = currentQuestionIndex + 1;
  progressBar.value = (currentQuestionIndex / questions.length) * 100;

  currentQuestion.options.forEach(option => {
      const optionElement = document.createElement('div');
      optionElement.classList.add('option');
      optionElement.innerHTML = `
          <input type="radio" name="answer" value="${option}" id="${option}">
          <label for="${option}">${option}</label>
      `;
      answerOptionsElement.appendChild(optionElement);
  });
}

submitButton.addEventListener('click', () => {
  const selectedOption = document.querySelector('input[name="answer"]:checked');
  if (!selectedOption) {
      feedbackElement.textContent = "Please select an answer.";
      return;
  }

  const userAnswer = selectedOption.value;
  const correctAnswer = questions[currentQuestionIndex].answer;

  if (userAnswer === correctAnswer) {
      feedbackElement.textContent = "Correct!";
      feedbackElement.style.color = "#28a745"; // Green for correct
      score++;
  } else {
      feedbackElement.textContent = `Incorrect! The correct answer is ${correctAnswer}.`;
      feedbackElement.style.color = "#FF0000"; // Red for incorrect
  }

  currentQuestionIndex++;
  currentQuestionElement.textContent = currentQuestionIndex + 1; // Update current question display
  progressBar.value = (currentQuestionIndex / questions.length) * 100;

  if (currentQuestionIndex < questions.length) {
      showQuestion();
  } else {
      showResult();
  }
});


function showResult() {
  document.getElementById('quiz-container').style.display = 'none';
  resultElement.style.display = 'block';
  scoreElement.textContent = `${score} out of ${questions.length}`;
}

restartButton.addEventListener('click', () => {
  startQuiz();
});

// Start the quiz
startQuiz();
