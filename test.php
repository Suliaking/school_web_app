<!DOCTYPE html>
<?php include "session.php"; ?>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/king-school.png">
    <title></title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/dist/css/test.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include "topnavbar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include "leftsidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tests</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Tests</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <head>
                <meta charset="UTF-8">
                <title>Quiz</title>
            </head>

            <body>
                <header></header>
                <main>
                    <div id="quiz" class="active">
                        <div class="quiz--steps"></div>
                        <div class="quiz--question"></div>
                        <div class="quiz--answers"></div>
                        <div class="quiz--buttons">
                            <button class="quiz--button prev">Back</button>
                            <button class="quiz--button next active">Next</button>
                            <button class="quiz--button submit">Submit</button>
                        </div>
                    </div>
                    <div class="quiz--final"></div>
                </main>
                <footer></footer>
            </body>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php'; ?>

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <?php include 'profilemodal.php'; ?>

        <?php include 'wallet.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>
</body>
<script>
    class Question {
        constructor(question, answers, type) {
            this.question = question;
            this.answers = answers;
            this.type = type;
        }
    }

    class Answer {
        constructor(answer) {
            this.answer = answer;
        }
    }

    class Type {
        constructor(type) {
            this.type = type;
        }
    }

    class Quiz {
        constructor(questions, results) {
            this.questions = questions;
            this.results = results;
            this.current = 0;
            this.length = questions.length;

            this.quizDOM = document.querySelector("#quiz");
            this.quizSteps = this.quizDOM.querySelector(".quiz--steps");
            this.quizQuestion = this.quizDOM.querySelector(".quiz--question");
            this.quizAnswers = this.quizDOM.querySelector(".quiz--answers");
            this.quizButtons = this.quizDOM.querySelector(".quiz--buttons");

            this.prevBtn = this.quizButtons.querySelector(".prev");
            this.nextBtn = this.quizButtons.querySelector(".next");
            this.submitBtn = this.quizButtons.querySelector(".submit");

            this.quizFinal = document.querySelector(".quiz--final");
        }

        Init() {

            this.nextBtn.addEventListener("click", this.Next.bind(this));
            this.prevBtn.addEventListener("click", this.Prev.bind(this));
            this.submitBtn.addEventListener("click", this.Submit.bind(this));

            this.quizSteps.innerHTML = "";
            for (let i = 1; i <= this.length; i++) {
                const quizStep = document.createElement("div");
                quizStep.classList.add("quiz--step");
                quizStep.innerText = i;
                if (i === this.current + 1) {
                    quizStep.classList.add("active");
                }
                this.quizSteps.appendChild(quizStep);
            }

            this.UpdateQuestion();
            this.UpdateAnswers();
            this.UpdateButtons();
        }

        Next() {
            this.SaveCurrentAnswer();
            this.current += 1;

            if (this.current >= this.length) {
                this.Submit();
            } else {
                this.Update();
            }
        }

        Prev() {
            this.current -= 1;

            if (this.current >= 0) {
                this.Update();

                const currentResult = this.results[this.current];
                for (const answer of this.quizAnswers.querySelectorAll("input")) {
                    if (
                        answer.value === currentResult[this.questions[this.current].question]
                    ) {
                        answer.checked = true;
                    }
                }

                this.EnableNextButton();
                this.results.pop();
            }
        }

        Update() {
            if (this.current < this.length) {
                this.UpdateSteps();
                this.UpdateQuestion();
                this.UpdateAnswers();
                this.UpdateButtons();
            }
        }

        UpdateSteps() {
            const steps = this.quizSteps.querySelectorAll(".quiz--step");
            for (const step of steps) {
                step.classList.remove("active");
                if (Number(step.innerText) === this.current + 1) {
                    step.classList.add("active");
                }
            }
        }

        UpdateQuestion() {
            this.quizQuestion.innerHTML = `<strong>Question ${this.current + 1} of ${this.length}:</strong> ${this.questions[this.current].question}`;
        }

        UpdateAnswers() {
            this.quizAnswers.innerHTML = "";
            const currentAnswers = this.questions[this.current].answers;
            const optionLetters = ['A', 'B', 'C', 'D', 'E', 'F'];

            for (let i = 0; i < currentAnswers.length; i++) {
                const answer = document.createElement("div");
                answer.classList.add("quiz--answer");

                const input = document.createElement("input");
                input.type = this.questions[this.current].type.type;
                input.name = `answer`;
                input.id = `answer-${i}`;
                input.value = currentAnswers[i].answer;
                input.addEventListener("change", this.HandleRadioChange.bind(this));

                const label = document.createElement("label");
                label.setAttribute("for", `answer-${i}`);
                label.innerText = `(${optionLetters[i]}) ${currentAnswers[i].answer}`;

                answer.appendChild(input);
                answer.appendChild(label);
                this.quizAnswers.appendChild(answer);
            }
        }


        UpdateButtons() {
            this.prevBtn.classList.remove("active");
            this.nextBtn.classList.remove("active");
            this.submitBtn.classList.remove("active");

            this.submitBtn.disabled = true;

            if (this.current < 1) {
                this.nextBtn.classList.add("active");
            } else if (this.current > 0 && this.current < this.length - 1) {
                this.prevBtn.classList.add("active");
                this.nextBtn.classList.add("active");
            } else {
                this.prevBtn.classList.add("active");
                this.submitBtn.classList.add("active");
            }
        }

        HandleRadioChange(event) {
            if (event.target.checked) {
                this.nextBtn.disabled = false;
                this.submitBtn.disabled = false;
            }
        }

        EnableNextButton() {
            for (const answer of this.quizAnswers.querySelectorAll("input")) {
                if (answer.checked) {
                    this.nextBtn.disabled = false;
                }
            }
        }

        SaveCurrentAnswer() {
            const questionName = this.questions[this.current].question;

            for (const answer of this.quizAnswers.querySelectorAll("input")) {
                if (answer.checked) {
                    this.results.push({ [questionName]: answer.value });
                }
            }
        }

        Submit() {
            this.SaveCurrentAnswer();
            this.quizDOM.classList.remove("active");
            this.quizFinal.classList.add("active");

            let final = "";
            for (const answer of this.results) {
                final += `${Object.keys(answer)[0]}: ${Object.values(answer)[0]}\r\n`;
            }

            this.quizFinal.innerText = final;
        }
    }

    // Updated math-related questions
    const questions = [
        new Question("What is 5 + 3?", [new Answer("6"), new Answer("8"), new Answer("10"), new Answer("7")], new Type("radio")),
        new Question("What is 12 - 7?", [new Answer("6"), new Answer("4"), new Answer("5"), new Answer("3")], new Type("radio")),
        new Question("What is 4 × 6?", [new Answer("24"), new Answer("20"), new Answer("16"), new Answer("18")], new Type("radio")),
        new Question("Square root of 49 is?", [new Answer("6"), new Answer("7"), new Answer("8"), new Answer("9")], new Type("radio")),
        new Question("If x = 3, what is 2x + 5?", [new Answer("10"), new Answer("11"), new Answer("12"), new Answer("13")], new Type("radio")),
        new Question("What is 15 ÷ 3?", [new Answer("4"), new Answer("5"), new Answer("3"), new Answer("6")], new Type("radio")),
        new Question("Next in sequence: 2, 4, 6, 8, ?", [new Answer("9"), new Answer("10"), new Answer("12"), new Answer("14")], new Type("radio")),
        new Question("Which is a prime number?", [new Answer("4"), new Answer("6"), new Answer("7"), new Answer("8")], new Type("radio")),
        new Question("What is the value of 3²?", [new Answer("6"), new Answer("9"), new Answer("12"), new Answer("8")], new Type("radio")),
        new Question("If triangle has angles 90°, 45°, and ?, what is missing angle?", [new Answer("35°"), new Answer("45°"), new Answer("60°"), new Answer("90°")], new Type("radio"))
    ];

    const results = [];
    const quizz = new Quiz(questions, results);
    quizz.Init();
</script>

</html>