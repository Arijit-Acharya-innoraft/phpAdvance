/**
 * This is a function which validates the email, based on the input format.
 * If user does not enter a valid format email it will disable the submit button else it will allow submission.
 */
function validateEmail() {
  
  /**
  * variable to store the user input email.
  */
  var inpEmail = document.getElementById("email").value;

  /**
   *Variable to store the proper email format, created using regex expression. 
  */
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  /**
   * Condition to check if the length is greater than 0, that is to check if the user has entered anything or not
   */
  if (inpEmail.length > 0) {

    /**
     * Checking that the email that the user has entered is syntaxically valid or not. 
     * If it is valid it is allowing the user to submit
    */
    if (validRegex.test(inpEmail)) {
      document.getElementById("email_error").innerHTML = "";
      document.getElementById("submit").disabled = false;
      document.getElementById("submit").style.color = "white";
      document.getElementById("submit").style.backgroundColor = "red";
    }

    /**
     * If the entered email is not syntaxically correct, it doesnot allow the user to submit.
    */
    else {
      document.getElementById("submit").disabled = true;
      document.getElementById("submit").style.color = "red";
      document.getElementById("submit").style.backgroundColor = "white";
    }
  }

  /**
   * If the user has not entered anything it asks the user to enter his/her email address.
  */
  else {
    document.getElementById("email_error").innerHTML = "*Enter your email id.";
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").style.color = "red";
    document.getElementById("submit").style.backgroundColor = "white";
  }
}
