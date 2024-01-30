<?php

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';


$errors =[
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];
if(isset($_POST['submit'])){

    //تحقق الإسم الأول
    if(empty($firstName)){
        $errors['firstNameError']='يرجي ادخال الإسم الأول';
    }

    //تحقق الإسم الأخير
    if(empty($lastName)){
        $errors['lastNameError']='يرجي ادخال الإسم الأخير';
    }
    //تحقق الإسم الايميل
    if(empty($email)){
        $errors['emailError']='يرجي ادخال الإسم الإيميل';
    }elseif( !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError']='يرجي ادخال ايميل صحيح';
    }
    
    //تحقق لا يوجد أخطاء
    if(!array_filter($errors)){
        //هذا من شان المدخلات تكون كلها نصية ولا يقبل اكواد
        $firstName =    mysqli_real_escape_string($conn,$_POST['firstName'] ?? '');
        $lastName =     mysqli_real_escape_string($conn,$_POST['lastName'] ?? ''); 
        $email =        mysqli_real_escape_string($conn,$_POST['email'] ?? ''); 
    
        $sql ="INSERT INTO users(firstName,lastName,email)
                VALUES('$firstName','$lastName','$email')";

        if(mysqli_query($conn,$sql)){
            header('location: ' . $_SERVER['PHP_SELF']); // يقوم بتحديث الصفحة بعد الإرسال
        }else{
            echo 'Error: ' . mysqli_error($conn);
        }

    }
}