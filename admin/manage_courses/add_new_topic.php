
<!DOCTYPE html>
<html>
<head>
  <title></title>


  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="../..//css/admin.css">


</head>

<body>
  
<?php

   require("../includes/navbar.php");    //navigation bar included

 ?>
<?php

require("../includes/sidebar.php");    //navigation bar included

?>




<div class="main-content">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg mb-4">
                    <div class="card-header text-Primary py-3">
                        <h3 class="mb-0 text-center" ></i>Add Topic</h3>
                    </div>
                    
                    <div class="card-body p-4">
                        <form method="POST" action="verify/verify_changes.php" onsubmit="return validation()">
                          
                            
                            <!-- Course Name -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Course Name:</label>
                                <input type="text" name="coursename" 
                                       class="form-control bg-light py-3"
                                       readonly 
                                       value="<?php echo htmlspecialchars($_GET['course_name']); ?>">
                                <span id="name_error" class="text-danger small"></span>
                            </div>

                            <!-- Topic Name -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Topic Name:</label>
                                <input type="text" name="topic_name" 
                                       id="topic_name"
                                       class="form-control py-3"
                                       placeholder="Enter topic name">
                                <span id="desc_error" class="text-danger small"></span>
                            </div>

                            <!-- Content Editor -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Content:</label>
                                <textarea id="editor" name="editor" 
                                          class="form-control ckeditor" 
                                          placeholder="Enter content..."></textarea>
                                <span id="editor_error" class="text-danger small"></span>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" name="submitbtn" 
                                        class="btn btn-primary btn-lg px-5 py-3">
                                    <i class="fas fa-save mr-2"></i>Create Topic
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('.ckeditor'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 
                        'numberedList', '|', 'blockQuote', 'insertTable', 
                        'undo', 'redo'
                    ]
                },
                removePlugins: ['ImageUpload']
            })
            .catch(error => {
                console.error(error);
            });

        // Validation Function
        function validation() {
            let isValid = true;
            const editorData = CKEDITOR.instances.editor.getData();
            
            // Reset errors
            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');
            
            // Validate Topic Name
            const topicName = document.getElementById('topic_name').value.trim();
            if (!topicName) {
                document.getElementById('desc_error').textContent = '** Please enter topic name';
                isValid = false;
            }

            // Validate Editor Content
            if (editorData === '') {
                document.getElementById('editor_error').textContent = '** Please enter the description';
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>