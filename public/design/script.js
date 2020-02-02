/*********************** Menu déroulant *************************************************************/
$('#sub_ul_member').hide();
$('#sub_ul_account').hide();


$('#first_ul_member').hover(

    function(){
        $('#sub_ul_member').show();
    } ,
    function() {
        $('#sub_ul_member').hide();
    }
);

$('#first_ul_account').hover(

    function(){
        $('#sub_ul_account').show();
    } ,

    function() {
        $('#sub_ul_account').hide();
    }
);
/***************** input type range **********************************************************************/
var slider_min = $('#slider1_age_min');
var slider_max = $('#slider1_age_max');

$('#val_age_min').text(slider_min.val());
$('#val_age_max').text(slider_max.val());

slider_min.change(function () {
    $('#val_age_min').text(slider_min.val());
});

slider_max.change(function () {
    $('#val_age_max').text(slider_max.val());
});
/****************** Carousel ***************************************************************************/
class Carousel {
    element = null;
    nbr_element = null;
    counter = 0;

    constructor(element){
        this.element = element;
        this.nbr_element = element.length - 1;

        // on affiche le premier pour l'innitialiser
        $(this.element[this.counter]).show();
    }

    next(){
        if (this.counter === this.nbr_element){
            $(this.element[this.counter]).hide();
            this.counter = 0;
            $(this.element[this.counter]).show();
        } else {
            $(this.element[this.counter]).hide();
            $(this.element[++this.counter]).show();
        }
    }

    previous(){
        if (this.counter === 0){
            // on regarde si on est sur le premier élément du caroussel
            // si oui on masque l'élément puis on affecte une nouvelle valeur à counter
            // on affiche le dernier élément
            $(this.element[this.counter]).hide();
            this.counter = this.nbr_element;
            $(this.element[this.counter]).show();
        } else {
            $(this.element[this.counter]).hide();
            $(this.element[--this.counter]).show();
        }
    }
}

var select_carousel = $('.carousel');

var select_next = $('#next');
var select_previous = $('#previous');

carousel = new Carousel(select_carousel);

select_next.click(function(){
    carousel.next();
});

select_previous.click(function(){
    carousel.previous();
});
