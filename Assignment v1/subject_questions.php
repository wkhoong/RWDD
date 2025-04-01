<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the subject from the URL
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

// Fetch questions for the selected subject
$sql = "SELECT * FROM quiz_questions WHERE subject = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are questions
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "No questions found for this subject.";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($subject); ?> Questions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Add your styles here */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #b3b3b3;
        }
        .header {
            background-color: #c8f0f0;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .main {
            padding: 20px;
            margin-top: 20px;
        }
        .search-bar {
            margin-bottom: 20px; /* Add some space below the search bar */
            display: flex;
            align-items: center;
        }
        .search-bar input {
            width: 100%; /* Full width */
            padding: 15px; /* Increased padding for height */
            border: none;
            border-radius: 5px;
            background-color: #3a4b4c; /* Input background */
            color: white; /* Input text color */
            font-size: 16px; /* Increased font size */
        }
        .question-card {
            background-color: #2a3b3c;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .question-card button {
            margin-right: 10px;
        }
        .button {
            background-color: #8fd3d3;
            color: #2a3b3c;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px; /* Add some space to the right */
            width: 100px;
        }
        .button:hover {
            background-color: #2a3b3c; /* Change background color on hover */
            color: #c8f0f0; /* Change text color on hover */
        }
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #2a3b3c; /* Match the question card background */
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            border-radius: 10px; /* Rounded corners */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .back-button {
            background-color: #2a3b3c;
            color: #c8f0f0;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px; /* Add some space to the right */
        }
        .back-button:hover {
            background-color: #8fd3d3; /* Change background color on hover */
            color: #2a3b3c; /* Change text color on hover */
        }
                /* Input styles */
                input[type="text"], select {
            width: calc(100% - 22px); /* Full width minus padding */
            padding: 15px; /* Increased padding for height */
            margin: 5px 0 15px 0;
            border: none;
            border-radius: 5px;
            background-color: #3a4b4c; /* Input background */
            color: white; /* Input text color */
            font-size: 16px; /* Increased font size */
        }
        button[type="submit"] {
            background-color: #8fd3d3;
            color: #2a3b3c;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #2a3b3c; /* Change background color on hover */
            color: #c8f0f0; /* Change text color on hover */
        }
    </style>
</head>
<body>
<div class="header">
    <h1 style="color: #2a3b3c;"><?php echo htmlspecialchars($subject); ?> Questions</h1>
    <button class="back-button" onclick="window.location.href='lecturedash.php'">Back</button> <!-- Back button -->
</div>
<div class="main">
<div class="search-bar">
        <input id="searchInput" placeholder="Search questions..." type="text" onkeyup="filterQuestions()"/>
    </div>
    <?php foreach ($questions as $question): ?>
        <div class="question-card" data-id="<?php echo $question['id']; ?>">
        <p><strong>Question:</strong> <span class="question-text"><?php echo htmlspecialchars($question['question']); ?></span></p>
            <p><strong>Options:</strong></p>
            <ul>
                <li><?php echo htmlspecialchars($question['option_a']); ?></li>
                <li><?php echo htmlspecialchars($question['option_b']); ?></li>
                <li><?php echo htmlspecialchars($question['option_c']); ?></li>
                <li><?php echo htmlspecialchars($question['option_d']); ?></li>
            </ul>
            <p><strong>Correct Answer:</strong> <span class="correct-answer"><?php echo htmlspecialchars($question['correct_answer']); ?></span></p> <!-- Wrap correct answer in a span -->
            <button class="button" onclick="openModal(<?php echo $question['id']; ?>)">Edit</button> <!-- Edit button -->
            <button class="button" onclick="if(confirm('Are you sure you want to delete this question?')) { window.location.href='delete_questions.php?id=<?php echo $question['id']; ?>&subject=<?php echo urlencode($subject); ?>'; }">Delete</button> <!-- Delete button -->
        </div>
    <?php endforeach; ?>
</div>

    <!-- Modal for editing question -->
    <div id="editModal" class="modal">
        <div class="modal-content">
 <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Question</h2>
            <form id="editForm" method="POST" action="edit_questions.php">
                <input type="hidden" name="id" id="questionId">
                <label>Question:</label><br>
                <input type="text" name="question" id="questionText" required><br><br>
                <label>Option A:</label><br>
                <input type="text" name="option_a" id="optionA" required><br><br>
                <label>Option B:</label><br>
                <input type="text" name="option_b" id="optionB" required><br><br>
                <label>Option C:</label><br>
                <input type="text" name="option_c" id="optionC" required><br><br>
                <label>Option D:</label><br>
                <input type="text" name="option_d" id="optionD" required><br><br>
                <label>Correct Answer:</label><br>
                <input type="text" name="correct_answer" id="correctAnswer" required placeholder="Enter correct answer(s)"><br><br>
                <button type="submit">Update Question</button>
            </form>
        </div>
    </div>

    <script>
function openModal(id) {
    console.log("Opening modal for question ID:", id); // Check if this logs the correct ID
    // Fetch question data using AJAX
    fetch(`get_questions.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('questionId').value = data.question.id;
                document.getElementById('questionText').value = data.question.question;
                document.getElementById('optionA').value = data.question.option_a;
                document.getElementById('optionB').value = data.question.option_b;
                document.getElementById('optionC').value = data.question.option_c;
                document.getElementById('optionD').value = data.question.option_d;
                document.getElementById('correctAnswer').value = data.question.correct_answer; // Set the correct answer
                document.getElementById('editModal').style.display = "block";
            } else {
                alert('Error fetching question data.');
            }
        })
        .catch(error => {
            console.error('Error:', error); // Log any errors
        });
}

        function closeModal() {
            document.getElementById('editModal').style.display = "none";
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeModal();
            }
        }
        function filterQuestions() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const questionCards = document.querySelectorAll('.question-card');

    questionCards.forEach(card => {
        const questionText = card.querySelector('.question-text').textContent.toLowerCase();
        const optionA = card.querySelector('ul li:nth-child(1)').textContent.toLowerCase();
        const optionB = card.querySelector('ul li:nth-child(2)').textContent.toLowerCase();
        const optionC = card.querySelector('ul li:nth-child(3)').textContent.toLowerCase();
        const optionD = card.querySelector('ul li:nth-child(4)').textContent.toLowerCase();
        const correctAnswer = card.querySelector('.correct-answer').textContent.toLowerCase();

        if (questionText.includes(filter) || optionA.includes(filter) || optionB.includes(filter) || optionC.includes(filter) || optionD.includes(filter) || correctAnswer.includes(filter)) {
            card.style.display = ""; // Show the card
        } else {
            card.style.display = "none"; // Hide the card
        }
    });
}
document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);
    
    fetch('edit_questions.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the question card with new data
            const questionId = document.getElementById('questionId').value;
            const questionCard = document.querySelector(`.question-card[data-id='${questionId}']`);
            questionCard.querySelector('.question-text').textContent = document.getElementById('questionText').value;
            const options = questionCard.querySelectorAll('ul li');
            options[0].textContent = document.getElementById('optionA').value;
            options[1].textContent = document.getElementById('optionB').value;
            options[2].textContent = document.getElementById('optionC').value;
            options[3].textContent = document.getElementById('optionD').value;
            questionCard.querySelector('.correct-answer').textContent = document.getElementById('correctAnswer').value;

            closeModal(); // Close the modal
            alert(data.message); // Show success message
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the question.');
    });
});
</script>
</body>
</html>