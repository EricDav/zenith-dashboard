var firstName = $('#dfirstName');
var lastName = $('#dlastName');
var email = $('#demail');
var phoneNumber = $('#dphoneNumber');
var isError = false;
var id = null;

// Details for next of kin

var kfirstName = $('#kfirstName');
var klastName = $('#klastName');
var kemail = $('#kemail');
var kphoneNumber = $('#kphoneNumber');

var accountNumber = $('#accountNumber');
var bankName = $('#bankName');
var accountName = $('#accountName');


$('#update-details').click(function() {
    isError = false;
    clearUserDetailsError();
    if (!firstName.val().trim()) {
        $('#dfirstname-error').text('First name is required');
        isError = true;
    }
     if (!lastName.val().trim()) {
        $('#dlastname-error').text('Last name is required');
        isError = true;
    } 
    if (!email.val().trim()) {
        $('#demail-error').text('Email is required');
        isError = true;
    } 
     if (!phoneNumber.val().trim()) {
        $('#dphoneNumber-error').text('Phone number is required');
        isError = true;
    }

    if (!isError) {
        $('#update-details').css('disabled', true);
        $('#update-details').css('cursor', 'default');
        $('#update-details').text('Updating..');
        $.ajax('/updateUserDetails', { data: {'email': email.val(), 'phoneNumber' :phoneNumber.val(), 'firstName': firstName.val(), 'lastName': lastName.val()},
        type: 'POST',  success: function(result) {
            $('#update-details').css('disabled', false);
            $('#update-details').text('Update');
           response = result;
           console.log(result);
          if (!response.success) {
               const messages = response.message
               if (messages.hasOwnProperty('email')) {
                    $('#email-error').text(messages.email);
               }

               if (messages.hasOwnProperty('firstName')) {
                    $('#firstname-error').text(messages.firstName);
                }

                if (messages.hasOwnProperty('lastName')) {
                    $('#lastname-error').text(messages.lastName);
                }

                if (messages.hasOwnProperty('phoneNumber')) {
                    $('#password-error').text(messages.password);
                }

               //$('#error-message').text(response.message);
          } else {
            console.log('I got here o!!!');
            $('#m-success').css('display', 'block');
            setTimeout(function() {
                $('#m-success').css('display', 'none');
            }, 2000);
          }
       }});
    }
});


// Next of kin click event
$('#update-next-of-kin').click(function() {
    isError = false;
    clearNextOfKinError();
    if (!kfirstName.val().trim()) {
        $('#kfirstname-error').text('First name is required');
        isError = true;
    }
     if (!klastName.val().trim()) {
        $('#klastname-error').text('Last name is required');
        isError = true;
    } 
    if (!kemail.val().trim()) {
        $('#kemail-error').text('Email is required');
        isError = true;
    } 
     if (!kphoneNumber.val().trim()) {
        $('#kphoneNumber-error').text('Phone number is required');
        isError = true;
    }

    console.log({'email': kemail.val(), 'phoneNumber' :kphoneNumber.val(), 'firstName': kfirstName.val(), 'lastName': klastName.val()})
    if (!isError) {
        $('#update-next-of-kin').css('disabled', true);
        $('#update-next-of-kin').css('cursor', 'default');
        $('#update-next-of-kin').text('Updating..');
        $.ajax('/updateNextKinDetails', { data: {'email': kemail.val(), 'phoneNumber' :kphoneNumber.val(), 'firstName': kfirstName.val(), 'lastName': klastName.val()},
        type: 'POST',  success: function(result) {
            $('#update-next-of-kin').css('disabled', false);
            $('#update-next-of-kin').text('Update');
           response = result;
          if (!response.success) {
               const messages = response.message
               if (messages.hasOwnProperty('email')) {
                    $('#kemail-error').text(messages.email);
               }

               if (messages.hasOwnProperty('firstName')) {
                    $('#kfirstname-error').text(messages.firstName);
                }

                if (messages.hasOwnProperty('lastName')) {
                    $('#klastname-error').text(messages.lastName);
                }

                if (messages.hasOwnProperty('phoneNumber')) {
                    $('#kpassword-error').text(messages.phoneNumber);
                }

               //$('#error-message').text(response.message);
          } else {
            $('#n-success').css('display', 'block');
            setTimeout(function() {
                $('#n-success').css('display', 'none');
            }, 2000);
          }
       }});
    }
});

// Update bank account details
$('#update-account').click(function() {
    isError = false;
    clearAccountError();
    console.log(bankName.val().trim());
    if (!accountNumber.val().trim()) {
        $('#account-number-error').text('Account number is required');
        isError = true;
    }
     if (!accountName.val().trim()) {
        $('#account-name-error').text('Account name is required');
        isError = true;
    } 

    if (bankName.val().trim() == 'Select bank' ) {
        console.log('I am inside here');
        $('#bank-name-error').text('Bank name is required');
        isError = true;
    } 

    if (!isError) {
        $('#update-account').css('disabled', true);
        $('#update-account').css('cursor', 'default');
        $('#update-account').text('Updating..');
        $.ajax('/updateBankAccountDetails', { data: {'accountNumber': accountNumber.val(), 'accountName' :accountName.val(), 'bankName': bankName.val()},
        type: 'POST',  success: function(result) {
            $('#update-account').css('disabled', false);
            $('#update-account').text('Update');
           response = result;
          if (!response.success) {
               const messages = response.message
               if (messages.hasOwnProperty('accountName')) {
                    $('#account-name-error').text(messages.accountName);
               }

               if (messages.hasOwnProperty('bankName')) {
                    $('#bank-name-error').text(messages.bankName);
                }

                if (messages.hasOwnProperty('accountNumber')) {
                    $('#account-number-error').text(messages.accountName);
                }

               //$('#error-message').text(response.message);
          } else {
            $('#a-success').css('display', 'block');
            setTimeout(function() {
                $('#a-success').css('display', 'none');
            }, 2000);
          }
       }});
    }
});

function clearAccountError() {
    $('#account-name-error').text('');
    $('#bank-name-error').text('');
    $('#account-number-error').text('');
}

function clearNextOfKinError() {
    $('#kfirstname-error').text('');
    $('#klastname-error').text('');
    $('#kemail-error').text('');
    $('#dphoneNumber-error').text('')
}

function clearUserDetailsError() {
    $('#dfirstname-error').text('');
    $('#dlastname-error').text('');
    $('#demail-error').text('');
    $('#dphoneNumber-error').text('')
}