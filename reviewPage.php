<html>

<head>
    <title>Review Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .form-check{
            pointer-events: none;
        }
        #que_status { width:20%; } 


    </style>

</head>



<body>
    <div class='p-2'>
        <div class='row w-100'>
            <div class='col-2'>
            <a href='index.php'><img id='reset' src='https://www.ucertify.com/layout/themes/bootstrap4/images/logo/ucertify_logo.png'></a>
</div>

<div class='col-8'>
            <h1 class='text-center'>uCertify Test Prep</h1>
</div>
</div>

</div>

<div class='container'>
<div class='row mt-3'>
<div class='col-12'>
    <center>
<h3 id='que_status' class='text-dark text-center rounded'>Incorrect</h3>
</center>
</div>

<div class='row mt-3'>


<div class='container'>
<form>
    <p><strong class='queNo'>1</strong>. <span id='displayQuestion'>Question</span></p>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_1' type="radio" class="form-check-input" name="optradio"><span id='displayOption1'>Option 1</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_2' type="radio" class="form-check-input" name="optradio"><span id='displayOption2'>Option 2</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_3' type="radio" class="form-check-input" name="optradio"><span id='displayOption3'>Option 3</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_4' type="radio" class="form-check-input" name="optradio"><span id='displayOption4'>Option 4</span>
        </label>
        </div>
        <!-- <input type="radio">
        <input type="radio">
        <input type="radio">
        <input type="radio"> -->


</form>



</div>


</div>

</div>

<div class='row mt-5'>
<h3 class='float-left'>Explanation</h3>
</div>
<hr>

<div class='row'>
<p id='displayExplanation'>Explanation Paragraph</p>
</div>

<div class='row'>

<div class='col-12'>

        
        <div class='container d-flex justify-content-end mt-5 fixed-bottom '>
            <a href='/php-project/resultPage.php' class='btn m-2 btn-danger btn-lg'>Results</a>
            <a href='/php-project/index.php' class='btn m-2 btn-warning btn-lg text-white'> Go Back</a> 
        </div>
    

</div>

</div>

</div>





<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>

   var jsindex = 0;


        $.getJSON('question.json', function(data){

            console.log(data);

        var queries = {};
            $.each(document.location.search.substr(1).split('&'),function(c,q){
    var i = q.split('=');
    queries[i[0].toString()] = i[1].toString();
  });

  console.log(queries.que_index);
  jsindex = Number(queries.que_index);

    var questionAnswers = JSON.parse(data[jsindex].content_text);

    console.log(questionAnswers);

    // display question status
    var user_answers =  JSON.parse(sessionStorage.getItem('user_answers'));
    var correct_answers = JSON.parse(sessionStorage.getItem('correct_answers'));

    console.log('correct_answers from session:',correct_answers);

    if(user_answers[jsindex] && user_answers[jsindex]==correct_answers[jsindex]){
        $('#que_status').text('Correct').addClass('alert-success');
    }else if(!user_answers[jsindex]){
        $('#que_status').text('Not attempted').addClass('alert-warning');
    }else{
        $('#que_status').text('Incorrect').addClass('alert-danger');

    }
    

    // display que. no.
    $('.queNo').text(jsindex+1);

    // display question
    $('#displayQuestion').text(questionAnswers.question);

    // display options
    for(let i=0;i<questionAnswers.answers.length;i++){
                $(`#displayOption${i+1}`).text(questionAnswers.answers[i].answer);
                $(`#option_${i+1}`).val(questionAnswers.answers[i].answer);
            }

            // console.log('user_answers',user_answers);
            // console.log('jsindex',jsindex);

            var prevValue = user_answers[jsindex];
            var correctValue = correct_answers[jsindex];
            console.log('prevValue',prevValue);


            for(let i=0;i<questionAnswers.answers.length;i++){
            // console.log('value:',$('.form-check-input')[i].value);
        // $('.form-check-input').prop('checked', false);
    //    console.log($('.form-check-input')[i].value);

                console.log('prevValue',prevValue);

            

            // put green color to correct_answers
            if($('.form-check-input')[i].value == correctValue){
            console.log('====green=======');
            // $('.form-check-input')[i].addClass('text-success');

            $(`#displayOption${i+1}`).addClass('text-success');
            }

            if($('.form-check-input')[i].value == prevValue){
            console.log('====prev=======');
            $('.form-check-input')[i].click();
            

            if($('.form-check-input')[i].value == correctValue){
            $(`#displayOption${i+1}`).addClass('text-success');
            }
            if($('.form-check-input')[i].value != correctValue){
            $(`#displayOption${i+1}`).addClass('text-danger');
            }


            }


}

    // display Explanation
    // console.log(questionAnswers.explanation);
            $('#displayExplanation').text(questionAnswers.explanation);

            

            // reset session
    $('#reset').on('click', function(){
        console.log('session clear triggered');
        sessionStorage.clear();

    });
        });

  



    </script>
</body>

</html>