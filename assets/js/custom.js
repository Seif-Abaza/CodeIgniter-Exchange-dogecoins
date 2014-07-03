/**
 * Light Javascript "class" frameworking for you
 * to organize your code a little bit better.
 *
 * If you want more complex things, I'd suggest
 * importing something like Backbone.js as it
 * has much better abilities to handle a MVC
 * like framework including persistant stores (+1)
 *
 * @author  sjlu (Steven Lu)
 */
var Frontpage = function()
{
    /**
     * The exports variable is responsible for
     * storing and returning public functions
     * in the instantized class.
     */
    var exports = {};

    /**
     * Write your public functions like this.
     * Make sure you include it into the exports
     * variable.
     */
    function public_function()
    {
        /**
         * Note that we can still call
         * private functions within the scope
         * of the "class".
         */
        private_function();
    }
    exports.public_function = public_function;

    /**
     * Private functions are very similar, they
     * just are not included in the exports 
     * function.
     */
    function private_function()
    {

    }

    /**
     * You may wanna have a init() function
     * to do all your bindings for the class.
     */
    function init()
    {

    }
    exports.init = init;

    /**
     * Last but not least, we have to return
     * the exports object.
     */
    return exports;
}

/**
 * To initialize our Frontpage class, we need
 * to define it into a Javascript variable like
 * so.
 */
var frontpage = new Frontpage();

/**
 * We can then call the functions as like any
 * other object, just the ones included in the 
 * exports object that was returned from Frontpage()
 */
frontpage.public_function();

/**
 * Write all your event listeners in the 
 * document.ready function or else they
 * may not bind correctly. As a side note, I like
 * to just call a public function in a class
 * to handle all your bindings here.
 */


// pobiera ajacem wartosc 1 DOGE
function cenaDOGEWOW() {
    var url = 'http://gielda/doge/chart/cenaDOGEWOW';
    $.ajax({
        url: url
    }).done(function(data) {
        document.getElementById("cena1kdoge").innerHTML = ((parseFloat(data) * 1000).toFixed(2)).toString().replace(".", ",");
    }).fail(function() {
        document.getElementById("cena1kdoge").innerHTML = '0,00';
    });
}



$(document).ready(function() {
    frontpage.init();

    $('#tothemoon').click(function() {
        $("html, body").animate({scrollTop: 0}, 400);
        return false;
    });

    // tooltip table 
    $('#bidTable, #askTable, .tableHeader').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    $('.datatable').dataTable({
        "aaSorting": [[1, "desc"]],
        'bAutoWidth': false,
        "aoColumns": [
            {"sWidth": "15%"},
            {"sWidth": "13%"},
            {"sWidth": "18%"},
            {"sWidth": "10%"},
            {"sWidth": "26%"},
            {"sWidth": "18%"}
        ],
        "oLanguage": {
            "sLengthMenu": "Wyświetl _MENU_ ofert",
            "sZeroRecords": "Tabela jest pusta",
            "sInfo": "Wiersze od _START_ do _END_ z _TOTAL_ ofert",
            "sInfoEmpty": "Wiersze od 0 do 0 z 0 ofert",
            "sInfoFiltered": "(po filtrowaniu z _MAX_ ofert)",
            "oPaginate": {
                "sFirst": "Pierwsza",
                "sPrevious": "Poprzednia",
                "sNext": "Następna",
                "sLast": "Ostatnia"
            }
        }
    });
// 847
    $('.datatable2').dataTable({
        "aaSorting": [[1, "asc"]],
        'bAutoWidth': false,
        "aoColumns": [
            {"sWidth": "15%"},
            {"sWidth": "13%"},
            {"sWidth": "18%"},
            {"sWidth": "10%"},
            {"sWidth": "26%"},
            {"sWidth": "18%"}
        ],
        "oLanguage": {
            "sLengthMenu": "Wyświetl _MENU_ ofert",
            "sZeroRecords": "Tabela jest pusta",
            "sInfo": "Wiersze od _START_ do _END_ z _TOTAL_ ofert",
            "sInfoEmpty": "Wiersze od 0 do 0 z 0 ofert",
            "sInfoFiltered": "(po filtrowaniu z _MAX_ ofert)",
            "oPaginate": {
                "sFirst": "Pierwsza",
                "sPrevious": "Poprzednia",
                "sNext": "Następna",
                "sLast": "Ostatnia"
            }
        }
    });

    $('.datatableTest').dataTable({
        "aaSorting": [[5, "asc"]],
        'bAutoWidth': false,
        "aoColumns": [
            {"sWidth": "15%"},
            {"sWidth": "21%"},
            {"sWidth": "13%"},
            {"sWidth": "18%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "3%"}
        ],
        "oLanguage": {
            "sLengthMenu": "Wyświetl _MENU_ ofert",
            "sZeroRecords": "Tabela jest pusta",
            "sInfo": "Wiersze od _START_ do _END_ z _TOTAL_ ofert",
            "sInfoEmpty": "Wiersze od 0 do 0 z 0 ofert",
            "sInfoFiltered": "(po filtrowaniu z _MAX_ ofert)"
        }
    });

    $('.datatable, .datatable2, .datatableTest').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Szukaj');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });






    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });


    // wycena 1 k DOGE 
    cenaDOGEWOW(); // przy zaladowaniu 
    var timeout = setInterval(function() {
        cenaDOGEWOW();
    }, 60000); // co minute






});