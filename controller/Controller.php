<?php
class Controller
{
    private $_f3; // router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    public function home()
    {
        //echo '<h1>Welcome to my Food Page</h1>';

        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function personalInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = (int) $_POST['age'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $this->_f3->set('fname', $fname);
            $this->_f3->set('lname', $lname);
            $this->_f3->set('age', $age);
            $this->_f3->set('gender', $gender);
            $this->_f3->set('phone', $phone);

            if (empty($fname) || $this->_validator->validName($fname)) {
                $this->_f3->set('errors["fname"]', "Please enter your first name");
            }
            if (empty($lname) || $this->_validator->validName($lname)) {
                $this->_f3->set('errors["lname"]', "Please enter your last name");
            }
            if (empty($age) || !$this->_validator->validAge($age)) {

                $this->_f3->set('errors["age"]', "Please enter a valid age");
            }
            if (empty($phone) || $this->_validator->validPhone($phone)) {
                $this->_f3->set('errors["phone"]', "Please enter a valid phone ex:1234567890");
            }
            if(isset($_POST['checkbox'])){
                $_SESSION['member']=new PremiumMember();
                $_SESSION['premium']=true;
            }
            else{
                $_SESSION['member']= new Member();
            }

            if (empty($this->_f3->get('errors'))) {
                $_SESSION['member']->setFname($fname);
                $_SESSION['member']->setLname($lname);
                $_SESSION['member']->setAge($age);
                $_SESSION['member']->setGender($gender);
                $_SESSION['member']->setPhone($phone);
                $this->_f3->reroute('Profile');
            }
        }
        $view = new Template();
        echo $view->render("views/form1.html");
    }

    public function profile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bio= $_POST['bio'];
            $state= $_POST['seek'];
            $seek= $_POST['seek'];
            $email= $_POST['email'];
             if(empty($email) || $this->_validator->validEmail($email) ){
                 $this->_f3->set('errors["email"]', "Please enter a valid email");
             }
            if(empty($this->_f3->get('errors'))) {
                $_SESSION['member']->setBio($bio);
                $_SESSION['member']->setState($state);
                $_SESSION['member']->setSeeking($seek);
                $_SESSION['member']->setEmail($email);
                if(isset($_SESSION['premium'])){
                    $this->_f3->reroute('interests');}
                else{
                    $this->_f3->reroute('overview');
                }
            }
        }

        $this->_f3->set('states', getStates());
        $view = new Template();
        echo $view->render("views/form2.html");
    }

    public function interests()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $indoor = $_POST['indoor'];
            $outdoor= $_POST['outdoor'];
            if(!empty($indoor) && $this->_validator->validIndoor($indoor) ){
                $this->_f3->set('errors["indoor"]', "Please choose a listed indoor activity");
            }
            if(!empty($outdoor) && $this->_validator->validOutdoor($outdoor) ){
                $this->_f3->set('errors["email"]', "Please choose a listed outdoor activity");
            }
            $_SESSION['member']->setIndoor($indoor);
            $_SESSION['member']->setOutdoor($outdoor);

            $this->_f3->reroute('overview');
        }

        $this->_f3->set('inside', getIndoor());
        $this->_f3->set('outside', getOutdoor());
        $view = new Template();
        echo $view->render("views/form3.html");
    }
    public function overview()
    {
        $view = new Template();
        echo $view->render("views/summary.html");
        session_destroy();
    }

}