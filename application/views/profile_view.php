<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/voting.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
    <?php $this->load->view('header', ['title' => 'Home Page']); ?>
</head>
<body>
    <h1 class="user-profile-name">User Profile</h1>
    <div class="profile-container">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'ProfileDetails')">Profile Details</button>
        <button class="tablinks" onclick="openTab(event, 'YourQuestions')">Your Questions</button>
    </div>

    <div id="ProfileDetails" class="tabcontent">
        
        <h3>Profile Details</h3>
        <!-- Display Flash Messages -->
        <?php if ($this->session->flashdata('error')): ?>
            <p class="flash-message" style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <p class="flash-message" style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        <div id="viewProfile">
            <p>Username: <?php echo htmlspecialchars($user->username); ?></p>
            <p>Email: <?php echo htmlspecialchars($user->email); ?></p>
            <p>Joined Date: <?php echo htmlspecialchars(date('F j, Y', strtotime($user->joined_date))); ?></p>
            <p>First Name: <?php echo htmlspecialchars($user->first_name); ?></p>
            <p>Last Name: <?php echo htmlspecialchars($user->last_name); ?></p>
            <p>Mobile Number: <?php echo htmlspecialchars($user->mobile); ?></p>
            <p>Address: <?php echo htmlspecialchars($user->address); ?></p>
            <button class="btn" onclick="toggleEditForm()">Edit</button>
        </div>
        
        <form id="editProfileForm" action="<?php echo base_url('user/update_profile'); ?>" method="post" style="display:none;">
        <!-- Adding fields for username and email in the edit form -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->username); ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user->first_name); ?>">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user->last_name); ?>">
            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user->mobile); ?>">
            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo htmlspecialchars($user->address); ?></textarea>
            <button class="btn" type="submit">Save Changes</button>
            <button class="btn" type="button" onclick="toggleEditForm()">Cancel</button>
        </form>
    </div>

    <div id="YourQuestions" class="tabcontent">
        <h3>Your Questions</h3>
        <?php if (!empty($questions)): ?>
            <ul>
                <?php foreach ($questions as $question): ?>
                    <p><a href="<?php echo base_url('question/details/' . $question->id); ?>"><?php echo htmlspecialchars($question->title); ?></a></p>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No questions posted yet.</p>
        <?php endif; ?>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(clearMessages, 10000); // Clear messages after 10 seconds
        });

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function clearMessages() {
            const messages = document.querySelectorAll('.flash-message');
            messages.forEach(msg => {
                msg.style.display = 'none';
            });
        }
        
        document.getElementsByClassName('tablinks')[0].click();

        function toggleEditForm() {
            var form = document.getElementById('editProfileForm');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

    </script>
</body>
</html>
