<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Joining Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg" style="background-image: url('http://yesofcorsa.com/wp-content/uploads/2016/12/Abstract-Wallpaper-Widescreen.png');">
    <div class="container-xl bg-dark-transparent rounded p-4 mt-5"> 
        <div class="container-xl p-2 bg-opacity-10">
            <div class="row justify-content-center">
                <form id="internForm" class="custom-form p-3 bg-opacity-10 text-white rounded shadow" style="max-width: 600px;" method="POST" action="connection.php">
                    <h1 class="bg-info p-2 bg-opacity-100">Intern Joining Form</h1>
                    <div class="form-group border border-warning">
                        <label for="joinDate" class="text-light">Date of Joining</label>
                        <input type="date" class="form-control" id="joinDate" name="joinDate" required>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="internName" class="text-light">Name of the Intern</label>
                        <input type="text" class="form-control" id="internName" name="internName" required>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="email" class="text-light">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="phoneNumber" class="text-light">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required pattern="[0-9]{10}">
                    </div>

                    <div class="form-group border border-warning">
                        <label for="dob" class="text-light">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="age" class="text-light">Age</label>
                        <input type="text" class="form-control" id="age" name="age" readonly>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="department" class="text-light">Department</label>
                        <select class="form-control" id="department" name="department" required>
                            <option value="" disabled selected>Select your Department</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="AI-DS">Artificial Intelligence and Data Science</option>
                            <option value="ECE">Electronics and Communication Engineering</option>
                        </select>
                    </div>

                    <div class="form-group border border-warning">
                        <label for="internPeriod" class="text-light">Internship Period (in days)</label>
                        <input type="number" class="form-control" id="internPeriod" name="internPeriod" required>
                        
                    </div>

                    <div class="form-group border border-warning">
                        <label for="lastDate" class="text-light">Last Date</label>
                        <input type="text" class="form-control" id="lastDate" name="lastDate" readonly>
                    </div>
                      
                    <button type="button" class="btn btn-success" onclick="addIntern()">Add Intern</button>
                    <button type="button" class="btn btn-danger" onclick="deleteIntern()">Delete Intern</button>
                    <div id="message" class="message mt-3"></div> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function calculateAge() {
    var dob = new Date(document.getElementById('dob').value);
    var today = new Date();
        
        if (dob.getFullYear() > today.getFullYear()) {
        document.getElementById('dob').value = ''; // Clear the Date of Birth input
        document.getElementById('age').value = ''; // Clear the Age input
        alert('Invalid Date of Birth. Please enter a valid date.');
        return;
    }

    var age = today.getFullYear() - dob.getFullYear();

    // Ensure age is never negative
    age = Math.max(0, age);

    document.getElementById('age').value = age;
}
      
        function calculateLastDate() {
            var joinDate = new Date(document.getElementById('joinDate').value);
            var internPeriod = parseInt(document.getElementById('internPeriod').value);
            var lastDate = new Date(joinDate.getTime() + (internPeriod * 24 * 60 * 60 * 1000));
            var formattedLastDate = `${lastDate.getDate().toString().padStart(2, '0')}-${(lastDate.getMonth() + 1)
                .toString()
                .padStart(2, '0')}-${lastDate.getFullYear()}`;
            document.getElementById('lastDate').value = formattedLastDate;
        }

        function addIntern() {
            if (!validateEmail()) {
                document.getElementById('emailError').innerText = 'Invalid Email Format';
                return;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            if (!validatePhone()) {
                document.getElementById('phoneError').innerText = 'Invalid Phone Format';
                return;
            } else {
                document.getElementById('phoneError').innerText = '';
            }

            calculateAge();
            calculateLastDate();

            document.getElementById('message').innerText = 'Intern Added';

            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1500);
        }

        function deleteIntern() {
            document.getElementById('message').innerText = 'Intern Deleted';

            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1500);
        } 
        function validateEmail() {
            var email = document.getElementById('email').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isValid = emailRegex.test(email);

            if (!isValid) {
                document.getElementById('emailError').innerText = 'Invalid Email Format';
            } else {
                document.getElementById('emailError').innerText = '';
            }

            return isValid;
        }

        function validatePhone() {
            var phone = document.getElementById('phoneNumber').value;
            var phoneRegex = /^\d{10}$/;
            return phoneRegex.test(phone);
        }


       
        document.getElementById('dob').addEventListener('change', calculateAge);
        document.getElementById('joinDate').addEventListener('change', calculateLastDate);
        document.getElementById('internPeriod').addEventListener('input', calculateLastDate);
    </script>
</body>
</html>
