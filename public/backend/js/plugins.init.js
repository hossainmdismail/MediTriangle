/* Template Name: Doctris - Doctor Appointment Booking System
   Author: Shreethemes
   E-mail: support@shreethemes.in
   Created: January 2021
   Version: 1.4.0
   Updated: March 2022
   File Description: init JS file of the template
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Tinyslider           *
 *     02.  Maintenance js       *
 *     03.  Tobii lightbox       *
 *     04.  Datepicker           *
 *     05.  CK Editor            *
 *     06.  Switcher JS          *
 ================================*/

//=========================================//
/*/*            01) Tinyslider js          */
//=========================================//
if(document.getElementsByClassName('client-review-slider').length > 0) {
    var slider = tns({
        container: '.client-review-slider',
        items: 1,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 16,
    });
};

if(document.getElementsByClassName('slider-range-four').length > 0) {
    var slider = tns({
        container: '.slider-range-four',
        items: 4,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 24,
        responsive: {
            992: {
                items: 4
            },

            767: {
                items: 2
            },
            

            320: {
                items: 1
            },
        },
    });
};


if(document.getElementsByClassName('slider-range-three').length > 0) {
    var slider = tns({
        container: '.slider-range-three',
        items: 3,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 24,
        responsive: {
            992: {
                items: 3
            },

            767: {
                items: 2
            },

            320: {
                items: 1
            },
        },
    });
};


//=========================================//
/*/*            02) Maintenance js         */
//=========================================//

try {
    if(document.getElementById("maintenance")){
        var seconds = 3599;
        function secondPassed() {
            var minutes = Math.round((seconds - 30) / 60);
            var remainingSeconds = seconds % 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
            }
            document.getElementById('maintenance').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('maintenance').innerHTML = "Buzz Buzz";
            } else {
                seconds--;
            }
        }
        var countdownTimer = setInterval('secondPassed()', 1000);
    }
} catch (err) {

}

//=========================================//
/*/*            03) Tobii lightbox         */
//=========================================//

try {
    const tobii = new Tobii()
} catch (err) {

}

//=========================================//
/*/*            04) Datepicker js          */
//=========================================//

try {
    const start = datepicker('.start', { id: 1 })
    const end = datepicker('.end', { id: 1 })
} catch (err) {

}


//=========================================//
/*/*            05) CK Editor              */
//=========================================//

try {
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
} catch(err) {

}

//=========================================//
/*            06) Switcher JS              */
//=========================================//

try {    
    function setColor(theme) {
        document.getElementById('color-opt').href = './css/colors/' + theme + '.css';
        toggleSwitcher(false);
    };
    
    function setTheme(theme) {
        let bootstarpHref;
        let styleHref;

        switch (theme) {
            case "style-dark":
                bootstarpHref =  `../assets/css/bootstrap-dark.min.css`
                styleHref = "../assets/css/style-dark.min.css"
                break;
                case "style-rtl":
                bootstarpHref =  `../assets/css/bootstrap-rtl.min.css`
                styleHref = "../assets/css/style-rtl.min.css"
                break;
                case "style-dark-rtl":
                bootstarpHref =  `../assets/css/bootstrap-dark-rtl.min.css`
                styleHref = "../assets/css/style-dark-rtl.min.css"
                break;               
        
            default:
                bootstarpHref =  `../assets/css/bootstrap.min.css`
                styleHref = "../assets/css/style.min.css"
                break;
        }

        if(theme === "style-rtl" || theme === "style-dark-rtl"   ) document.getElementsByTagName("html")[0].dir = "rtl"
        else  document.getElementsByTagName("html")[0].dir = "ltr"
       
        document.getElementsByClassName('theme-opt')[0].href =bootstarpHref
        document.getElementsByClassName('theme-opt')[1].href =styleHref
        toggleSwitcher(false);
    };
} catch (error) {
    
}