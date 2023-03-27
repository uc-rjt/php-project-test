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
<h3 id='que_status' class='text-dark text-center rounded'></h3>
</center>
</div>

<div class='row mt-3'>


<div class='container'>
<form>
    <p><strong class='queNo'>1</strong>. <span id='displayQuestion'>Question</span></p>

    <div class='options'>

</div>

        <!-- <div class="form-check">
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
        </div> -->
        <!-- <input type="radio">
        <input type="radio">
        <input type="radio">
        <input type="radio"> -->


</form>




<div class="d-flex justify-content-end fixed-bottom bg-light py-3 border-top border-dark">

    <div class='mr-5'>
    <!-- <button class='countdown px-4 mx-2 border-0 bg-transparent'><span id='timer' class='js-timeout'>30:00</span></button> -->

    <button id='slide-button' class='px-4 mx-2 py-2 btn btn-success slide-button'>List</button>
    <a id='prev' class='px-4 mx-2 py-2 btn btn-outline-primary'>Previous</a>

    <button class='border-0 bg-transparent'><span class='queNo'>01</span> of <span class='totalQue'>11</span></button>

    <a id='next' class='px-4 mx-2 py-2 btn btn-outline-primary'>Next</a>
    <button id='endTest' class='px-4 mx-2 py-2 btn btn-danger' data-toggle="modal" data-target="#myModal">Results</button>
    <button id='goBack' class='px-4 mx-2 py-2 btn btn-warning text-white' data-toggle="modal" data-target="#myModal">Go Back</button>
</div>



</div>

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

        
        <!-- <div class='container d-flex justify-content-end mt-5 fixed-bottom '>
            <a href='/php-project/resultPage.php' class='btn m-2 btn-danger btn-lg'>Results</a>
            <a href='/php-project/index.php' class='btn m-2 btn-warning btn-lg text-white'> Go Back</a> 
        </div> -->

        
    

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

//   disable next-prev as per jsindex
  if(jsindex==0){
    console.log('jsindex==0: ', jsindex);
    $('#prev').prop('disabled', true);
    $('#prev').addClass('disabled');
  }else  if(jsindex==10){
        console.log('jsindex==10: ',jsindex);
        $('#next').prop('disabled', true);
        $('#next').addClass('disabled');

            }

  



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
    $('.queNo').text(jsindex+1<=9?`0${jsindex+1}`:jsindex+1);

    // display question
    $('#displayQuestion').text(questionAnswers.question);

    // make options dynamically START
    let optionsHtml = ``;
    for(let i=0;i<questionAnswers.answers.length;i++){
        optionsHtml += `<div class="form-check">
        <label class="form-check-label">
            <input id='option_${i+1}' type="radio" class="form-check-input" name="optradio"><span class='answer_input' id='displayOption${i+1}'>Option ${i+1}</span>
        </label>
        </div>
        `;

    }
    console.log('optionsHtml:', optionsHtml);
    $('.options').append(optionsHtml);
    console.log('.options:',$('.options'));





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

    // next-prev functionality
    $('#next').on('click', function(){
        // if(jsindex==10){
        //         $('#next').prop('disabled', true);
        //     }

        
            if(jsindex<data.length-1){
        $('#next').attr('href', `reviewPage.php?que_index=${jsindex+1}`);
        // $('#next').click();
        

    }
    // else if(jsindex == data.length-1){
    //     console.log('array end is reached');
    //         $('#next').prop('disabled', true);
    //             $('#next').addClass('disabled');
    //     }
    //     else{
    //             $('#next').prop('disabled', true);
    //             $('#next').addClass('disabled');

    // }

    });

    $('#prev').on('click', function(){
        // if(jsindex==10){
        //         $('#next').prop('disabled', true);
        //     }

        
            if(jsindex>0){
        $('#prev').attr('href', `reviewPage.php?que_index=${jsindex-1}`);
        // $('#next').click();
    }
    
    // else if(jsindex==0){
    //     $('#prev').prop('disabled', true);
    //     $('#prev').addClass('disabled');
    // }

    });

        });

  



    </script>
</body>

</html>