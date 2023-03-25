<html>

<head>
    <title>Test Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    *{
        padding:0;
        margin:0;
        box-sizing: border-box;
    }

    .local-navbar {
  /* background-color: #191E38; */
  border-radius: 0 .25rem .25rem 0;
  display: flex;
  flex-direction: column;
  padding-left: 2rem;
  padding-right: 2rem;
  padding-top: 0rem;
  position: absolute;
  left: -475px;
  transition: all .24s ease-in;
  width: 475px;
  font-size: 12px;
  position: absolute;
  overflow: scroll;
  z-index: 99;
  top: 0;
  height: 90vh;
}

.show {
  left:0;
}

li{
    cursor: pointer;
}

ol { 
    list-style-type: decimal-leading-zero;
}

ol > li::marker {
  font-weight: bold;
}

li:last-child{
    /* border-bottom: 2px solid red; */
    margin-bottom: none;
}

#local-navbar {
    overflow-x: hidden;
    padding-top: none;
}

    
</style>

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


<div class="container">

    <!-- side panel START-->
    <div id="local-navbar" class="local-navbar card card-body bg-light">     
            <ol class='mb-0'>
            </ol>
  </div>

    <!-- side panel END-->



    <form class='mt-5'>
    <p><strong class='queNo'>01</strong>. <span id='displayQuestion'>Question</span></p>

    <div class='options'>

    </div>

        <!-- <div class="form-check">
        <label class="form-check-label">
            <input id='option_1' type="radio" class="form-check-input" name="optradio"><span class='answer_input' id='displayOption1'>Option 1</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_2' type="radio" class="form-check-input" name="optradio"><span class='answer_input' id='displayOption2'>Option 2</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_3' type="radio" class="form-check-input" name="optradio"><span class='answer_input' id='displayOption3'>Option 3</span>
        </label>
        </div>

        <div class="form-check">
        <label class="form-check-label">
            <input id='option_4' type="radio" class="form-check-input" name="optradio"><span class='answer_input' id='displayOption4'>Option 4</span>
        </label>
        </div> -->
        <!-- <input type="radio">
        <input type="radio">
        <input type="radio">
        <input type="radio"> -->


</form>


 <div class="d-flex justify-content-end fixed-bottom bg-light py-3 border-top border-dark">

    <div class='mr-5'>
    <button class='countdown px-4 mx-2 border-0 bg-transparent'><span id='timer' class='js-timeout'>30:00</span></button>

    <button id='slide-button' class='px-4 mx-2 py-2 btn btn-success slide-button'>List</button>
    <button id='prev' class='px-4 mx-2 py-2 btn btn-outline-primary'>Previous</button>

    <button class='border-0 bg-transparent'><span class='queNo'>01</span> of <span class='totalQue'>11</span></button>

    <button id='next' class='px-4 mx-2 py-2 btn btn-outline-primary'>Next</button>
    <button id='endTest' class='px-4 mx-2 py-2 btn btn-danger' data-toggle="modal" data-target="#myModal">End Test</button>
</div>



</div>


<!-- end test Modal START -->

<div class="modal fade" id="myModal">
    
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-center">
        <h4 class="modal-title">End test?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body py-2">
        <div class='row'>
        <div class='col-12 text-center'>Do you wish to end this test?</div>
        </div>
        <div class='row mt-3'>
            <div class='col-4 text-center'>
            <h3 class='displayItems'>0</h3><span>Items</span>
            </div>
            <div class='col-4 text-center'>
            <h3 class='displayAttempted'>0</h3><span>Attempted</span>
            </div>
            <div class='col-4 text-center'>
            <h3 class='displayUnattempted'>0</h3><span>Unattempted</span>
            </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Close</button>
          <a id='finalEndTest' href='resultPage.php' class='btn btn-danger'>End Test</a>
      </div>

    </div>
  </div>

</div>




<!-- end test Modal END -->
 </div>



<!-- </div> -->


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>

   var jsindex = 0;

   console.log(jsindex);

  


   $.getJSON('question.json', function(data){

    console.log(data);

    var questionAnswers = JSON.parse(data[jsindex].content_text);

    $('#displayQuestion').text(questionAnswers.question);

    // display totalQue

    $('.totalQue').text(data.length<=9?`0${data.length}`:data.length);

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
    // make options dynamically END
    

    for(let i=0;i<questionAnswers.answers.length;i++){
                $(`#displayOption${i+1}`).text(questionAnswers.answers[i].answer);
                $(`#option_${i+1}`).val(questionAnswers.answers[i].answer);
            }

    // $('#displayOption1').text(questionAnswers.answers[0].answer);
    // $('#displayOption2').text(questionAnswers.answers[1].answer);
    // $('#displayOption3').text(questionAnswers.answers[2].answer);
    // $('#displayOption4').text(questionAnswers.answers[3].answer);


        // console.log(data.length);

        
            $('#prev').prop('disabled', true)
       

        
        $('#next').on('click', function(){
            console.log('data.length:', data.length);
            if(jsindex<data.length-1){
            jsindex++;

            $('.form-check-input').prop('checked', false);

            // console.log(data[jsindex].content_text);
             questionAnswers = JSON.parse(data[jsindex].content_text);
            // console.log(JSON.parse(data[jsindex].content_text));
            console.log(questionAnswers);
            $('#displayQuestion').text(questionAnswers.question);

            for(let i=0;i<questionAnswers.answers.length;i++){
                $(`#displayOption${i+1}`).text(questionAnswers.answers[i].answer);
                $(`#option_${i+1}`).val(questionAnswers.answers[i].answer);

            }

            // sideQue highlight START

            for(let i=0;i<data.length;i++){
                $(`#sideQue${i+1}`).removeClass('text-primary');
                $(`#sideQue${i+1}`).addClass('text-dark');
            }

            $(`#sideQue${jsindex+1}`).addClass('text-primary');
            $(`#sideQue${jsindex+1}`).removeClass('text-dark');
            // sideQue highlight END
            
            // $('#displayOption1').text(questionAnswers.answers[0].answer);
            // $('#displayOption2').text(questionAnswers.answers[1].answer);
            // $('#displayOption3').text(questionAnswers.answers[2].answer);
            // $('#displayOption4').text(questionAnswers.answers[3].answer);

            $('.queNo').text(jsindex+1<=9?`0${jsindex+1}`:jsindex+1);

             // persisting values
             var prevValue = user_answers[jsindex];

// console.log('prev',prevValue);
for(let i=0;i<questionAnswers.answers.length;i++){
// console.log('value:',$('.form-check-input')[i].value);

if($('.form-check-input')[i].value == prevValue){
// console.log('====prev=======');
$('.form-check-input')[i].click();
}

}
            

            $('#prev').prop('disabled', false);

            if(jsindex==0){
            $('#prev').prop('disabled', true)
            
        }else if(jsindex==data.length-1){
            $('#next').prop('disabled', true)
        }

            
        }else if(jsindex==data.length-1){
            console.log('array end is reached');
            $('#next').prop('disabled', true);

            console.log('queno.', jsindex+1);
            $('.queNo').text(jsindex+1<=9?`0${jsindex+1}`:jsindex+1);

            // $('.queNo').text(jsindex+1);
        }

        });

        $('#prev').on('click', function(){
            if(jsindex>0){
            jsindex--;

            $('.form-check-input').prop('checked', false);

            // console.log('log', $('.form-check-input')[0]);

            



            // $('.form-check-input').forEach(option =>{
            //     console.log(option);
            // });

           


            questionAnswers = JSON.parse(data[jsindex].content_text);

            $('#displayQuestion').text(questionAnswers.question);

            console.log('option length',questionAnswers.answers.length);

            for(let i=0;i<questionAnswers.answers.length;i++){
                $(`#displayOption${i+1}`).text(questionAnswers.answers[i].answer);
                $(`#option_${i+1}`).val(questionAnswers.answers[i].answer);

            }

            // sideQue highlight START

            for(let i=0;i<data.length;i++){
                $(`#sideQue${i+1}`).removeClass('text-primary');
                $(`#sideQue${i+1}`).addClass('text-dark');
            }

            $(`#sideQue${jsindex+1}`).addClass('text-primary');
            $(`#sideQue${jsindex+1}`).removeClass('text-dark');
            // sideQue highlight END

            // persisting values
            var prevValue = user_answers[jsindex];

                // console.log('prev',prevValue);
            for(let i=0;i<questionAnswers.answers.length;i++){
            // console.log('value:',$('.form-check-input')[i].value);

    if($('.form-check-input')[i].value == prevValue){
        // console.log('====prev=======');
        $('.form-check-input')[i].click();
    }

}

            // $('#displayOption1').text(questionAnswers.answers[0].answer);
            // $('#displayOption2').text(questionAnswers.answers[1].answer);
            // $('#displayOption3').text(questionAnswers.answers[2].answer);
            // $('#displayOption4').text(questionAnswers.answers[3].answer);
            
            // $('.queNo').text(jsindex+1);
            $('.queNo').text(jsindex+1<=9?`0${jsindex+1}`:jsindex+1);


            $('#next').prop('disabled', false);

            if(jsindex==0){
            $('#prev').prop('disabled', true)
        }else if(jsindex==data.length-1){
            $('#next').prop('disabled', true)
        }
            
            // console.log(data[jsindex]);
        }else{
            console.log('array start is reached');
            $('#prev').prop('disabled', true);
        }
        });

        // side panel
        $('#slide-button').click( function() {
        $('#local-navbar').toggleClass('show');
     });
     
    //    display side panel questions
     var sideListItem = ``;

     for(var i=0;i<data.length;i++){
        sideListItem += `<li class='mt-3 pb-2 border-bottom side-list-item'><a class='h6 text-dark text-decoration-none' id='sideQue${i+1}' value='${i}'>${data[i].snippet}</a></li>`
     }

    //  console.log('sideListItem:',sideListItem[0]);

    
    
    // console.log('side-list-item:', ($('.side-list-item'))[0]);
    
    //  sideListItem[0].addClass('text-primary');
    
    $('ol').html(sideListItem);
    // $('.side-list-item')[0].addClass('text-primary');

    console.log('sideQue1',$('#sideQue1'));

    // change color of selected side que
    $('#sideQue1').toggleClass('text-primary');
    $('#sideQue1').removeClass('text-dark');

    // console.log('side-list-item:', $('.side-list-item')[0]);




    // for(var i=0;i<data.length;i++){
    // $(`#sideQue${i+1}`).text(data[i].snippet);
    // }

    // $('#sideQue1').text(data[0].snippet)
    

    var listItem = $('a');

    $('a').on('click', function(e){
        // console.log('jquery event:',$(e.target).attr('value'));

        console.log("$('a'):",$('a'));

       
        
        $('.form-check-input').prop('checked', false);

        $('#slide-button').click();
       


        jsindex = $(e.target).attr('value');
            questionAnswers = JSON.parse(data[jsindex].content_text);

            // sideQue highlight START

            for(let i=0;i<data.length;i++){
                $(`#sideQue${i+1}`).removeClass('text-primary');
                $(`#sideQue${i+1}`).addClass('text-dark');
            }

            $(e.target).addClass('text-primary');
            $(e.target).removeClass('text-dark');
            // sideQue highlight END

            // console.log('sideQueColor:',$(`#sideQue${jsindex+1}`).toggleClass('text-primary'));
            // $(`#sideQue${jsindex+1}`).removeClass('text-dark');

            $('#displayQuestion').text(questionAnswers.question);

            for(let i=0;i<questionAnswers.answers.length;i++){
                $(`#displayOption${i+1}`).text(questionAnswers.answers[i].answer);
                $(`#option_${i+1}`).val(questionAnswers.answers[i].answer);
            }

              // persisting values

              let user_option = user_answers[jsindex];
                    
              console.log(user_answers);
            //   console.log('user_option',user_option);
              console.log('jsindex', jsindex);

              for(let i=0;i<questionAnswers.answers.length;i++){
              console.log('user_option',user_option);

              console.log("$('.form-check-input')[i].value",$('.form-check-input')[i].value);

                  if($('.form-check-input')[i].value == user_option){
                    console.log('value:',$('.form-check-input')[i].value);
                    $('.form-check-input')[i].click();
                    
                }
              }

            //     let prevValue = user_answers[jsindex];

            // console.log('prev',jsindex);
            // for(let i=0;i<questionAnswers.answers.length;i++){
            // console.log('value:',$('.form-check-input')[i].value);
        // $('.form-check-input').prop('checked', false);
    //    console.log($('.form-check-input')[i].value);

            // if($('.form-check-input')[i].value == prevValue){
            // console.log('====prev=======');
            // $('.form-check-input')[i].click();
            // }

// }

            // $('#displayQuestion').text(questionAnswers.question);
            // $('#displayOption1').text(questionAnswers.answers[0].answer);
            // $('#displayOption2').text(questionAnswers.answers[1].answer);
            // $('#displayOption3').text(questionAnswers.answers[2].answer);
            // $('#displayOption4').text(questionAnswers.answers[3].answer);


            var number = jsindex;
            number++;

            console.log(number);
            // $('.queNo').text(number);
            $('.queNo').text(number<=9?`0${number}`:number);


            if(jsindex==0){
            $('#prev').prop('disabled', true)
            $('#next').prop('disabled', false)

        }else if(jsindex==10){
            $('#next').prop('disabled', true)
            $('#prev').prop('disabled', false)

        }else{
            $('#prev').prop('disabled', false)
            $('#next').prop('disabled', false)
        }

    })

   


    // hide sideList when clicked outside START

    window.addEventListener('click', function(e){   
        let _opened = $('#local-navbar').hasClass('show');

  if (_opened===true && !document.getElementById('local-navbar').contains(e.target) && !document.getElementById('slide-button').contains(e.target)){
    // Clicked in box
    console.log('clicked outside sidelist');
    // $('#slide-button').click();
    $('#local-navbar').toggleClass('show')


    console.log(_opened);
  } 
});

    // $('.outsideList').on('click', function(){
    //     console.log('clicked outside list');

    //     let _opened = $('#local-navbar').hasClass('show');

    //     if(_opened===true){
    //         $('#slide-button').click();
    //         console.log(_opened);
    //     }

    // });

//     $(document).ready(function(){
//     $(document).click(function (event) {
//         let clickover = $(event.target);
//         let _opened = $('#local-navbar').hasClass('show');

        
//         if (_opened === true && !clickover.hasClass("local-navbar")) {
//             // console.log(_opened);
//             // $("button.navbar-toggle").click();
//             // $('#slide-button').click();
//             // $('#local-navbar').removeClass('show');
//         }

//     });
// })
//     console.log('sidebarContainer:', sidebarContainer);
// $(document).click(function(e){
//         let sidebarContainer = $('#local-navbar');

//         // if the target of the click isn't the container nor a descendant of the container
//     if (!sidebarContainer.is(e.target) && sidebarContainer.has(e.target).length === 0){
//         $('#slide-button').click();
//         console.log('outside the sideList');

//     }

//     })
    
    // hide sideList when clicked outside END

    console.log(listItem);


    // for(var i=0;i<=11;i++){
    //    console.log(listItem[i]);

    //    listItem[i].addEventListener('click', function(e){
    //         console.log($(e.target).attr('value'));

    //         jsindex = $(e.target).attr('value');
    //         questionAnswers = JSON.parse(data[jsindex].content_text);
    //         $('#displayQuestion').text(questionAnswers.question);
    //         $('#displayOption1').text(questionAnswers.answers[0].answer);
    //         $('#displayOption2').text(questionAnswers.answers[1].answer);
    //         $('#displayOption3').text(questionAnswers.answers[2].answer);
    //         $('#displayOption4').text(questionAnswers.answers[3].answer);

    //         var number = jsindex;
    //         number++;

    //         console.log(number);
    //         $('.queNo').text(number);

    //         if(jsindex==0){
    //         $('#prev').prop('disabled', true)
    //         $('#next').prop('disabled', false)

    //     }else if(jsindex==10){
    //         $('#next').prop('disabled', true)
    //         $('#prev').prop('disabled', false)

    //     }else{
    //         $('#prev').prop('disabled', false)
    //         $('#next').prop('disabled', false)
    //     }


    //    })
    // }

    // CHECKING OPTIONS START

    // collecting options
    var correct_answers = [];
        for(var i=0;i<data.length;i++){
            questionAnswers = JSON.parse(data[i].content_text);

            
            for(var j=0;j<questionAnswers.answers.length;j++){
            if(questionAnswers.answers[j].is_correct==1){
                
                console.log(questionAnswers.answers[j].answer);
                correct_answers.push(questionAnswers.answers[j].answer);
            }
        }
        }

        console.log('correct_answers:', correct_answers);

        

        console.log($('.answer_input').text());

        // $('.form-check-input').on('click', function(e){
        //     console.log('value',$(e.text()));
        // })
            var user_answers = [];

            var filtered_user_answers = [];
            var attempted = 0;
            
        $('.answer_input').on('click', function(e){
            console.log(e.target.innerText);

            user_answers[jsindex] = e.target.innerText;
            console.log('user_answers:',user_answers);

            filtered_user_answers = user_answers.filter(Boolean);

            console.log(filtered_user_answers);
            
            attempted = filtered_user_answers.length;
            
            
            console.log(user_answers.length);
            console.log('attempted', attempted);
        });

// check options


    // CHECKING OPTIONS END

    // final end test link / sessionStorage

    $('#endTest').on('click', function(){

        // render question count
        $('.displayItems').text(data.length);
        $('.displayAttempted').text(attempted);
        $('.displayUnattempted').text(data.length - attempted);

        // session storage 
        sessionStorage.setItem('user_answers',JSON.stringify(user_answers));
        sessionStorage.setItem('correct_answers', JSON.stringify(correct_answers));

        console.log('session-triggered');
        // console.log(sessionStorage.setItem('user_answer',user_answers));
    });

    // session reset

    $('#reset').on('click', function(){
        console.log('session clear triggered');
        sessionStorage.clear();

    });



   

   });

// Timer
// var minutes = 1, seconds = 50;
//   jQuery(function(){
//     jQuery("span.countdown").html(minutes + ":" + seconds);
//     var count = setInterval(function(){ if(parseInt(minutes) < 0) { clearInterval(count); } else {jQuery("span.countdown").html(minutes + ":" + seconds); if(seconds == 0) { minutes--; if(minutes < 10) minutes = "0"+minutes; seconds = 59;} seconds--; if(seconds < 10) minutes = "0"+seconds;} if(minutes=='0' && seconds=='00'){console.log('timer ended'); clearInterval();} console.log(minutes + ":" + seconds); }, 1000);
//   });

// var minutes = 0; // set the minutes
//     var seconds = 05; // set the seconds
//     var countdown = setInterval(function() {
//       if (seconds == 0) {
//         minutes--;
//         seconds = 59;
//       } else {
//         seconds--;
//       }
//       document.getElementById("timer").innerHTML = minutes + ":" + seconds;
//       if (minutes == 0 && seconds == 00) {
//         clearInterval(countdown);
//         document.getElementById("endTest").click();
//       }
//     }, 1000);


 // hide sideList when clicked elsewhere
    
 

var timer2 = "30:00";
var interval = setInterval(function() {


  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0 && seconds==00) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('#timer').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;

  if(minutes=='0' && seconds=='00'){
    
    console.log('timer ended');
    $('#endTest').click();
    clearInterval(interval);
  }
}, 1000);



// if(timer == '')

// const time = new Date();



    



</script>
</body>

</html>