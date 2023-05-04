// $('#sliderDescription').keyup(function (){
//     var sliderDescription = $(this).val();
//     if (sliderDescription.length >= 2)
//     {
//         $('#sliderDescriptionError').text(' ');
//     }
//     else
//     {
//         $('#sliderDescriptionError').text('Please type minimum 5 letter in here!!');
//     }
// });

//Slider Url validation-view (slider_section)
function checkUrl() {
    var buttonUrl = $('#buttonUrl').val();
    var regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig;
    if (regex.test(buttonUrl))
    {
        $('#sliderBtn').prop('disabled', false);
        $('#buttonUrlError').text(' ');
        return true;
    }
    else
    {
        $('#sliderBtn').prop('disabled', true);
        $('#buttonUrlError').text('Please Type Valid Url !');
        return false;
    }
}
$('#buttonUrl').keyup(function (){
    checkUrl();
});
//Slider Url validation end

$('#sliderForm').submit(function () {
    if (checkUrl() == true)
    {
        return true;
    }
    else
    {
        return false;
    }
});

//Slider Image Preview-view (slider_section)
var loadFile = function(event) {
    var output= document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

