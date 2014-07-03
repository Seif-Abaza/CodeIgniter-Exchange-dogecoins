var doge_btc = 1;
var btc_pln = 2500.0;

$(document).ready(function() {
    var url = 'http://gielda/doge/chart/cena_doge_btc';
    $.ajax({
        url: url
    }).done(function(data) {
        data = $.parseJSON(data);
        doge_btc = parseFloat(data.doge);
        btc_pln = parseFloat(data.btc);
    }).fail(function() {
        doge_btc = 0;
        btc_pln = 0;
    });
});
/**
 * @param {float} num
 * @param {int} casasDec
 * @param {String} sepDecimal
 * @param {String} sepMilhar
 * @returns {String} */
function formatFloat(num, casasDec, sepDecimal, sepMilhar) {
    if (num < 0)
    {
        num = -num;
        sinal = -1;
    } else
        sinal = 1;
    var resposta = "";
    var part = "";
    if (num != Math.floor(num)) // decimal values present
    {
        part = Math.round((num - Math.floor(num)) * Math.pow(10, casasDec)).toString(); // transforms decimal part into integer (rounded)
        while (part.length < casasDec)
            part = '0' + part;
        if (casasDec > 0)
        {
            resposta = sepDecimal + part;
            num = Math.floor(num);
        } else
            num = Math.round(num);
    } // end of decimal part
    while (num > 0) // integer part
    {
        part = (num - Math.floor(num / 1000) * 1000).toString(); // part = three less significant digits
        num = Math.floor(num / 1000);
        if (num > 0)
            while (part.length < 3) // 123.023.123  if sepMilhar = '.'
                part = ' ' + part; // 023
        resposta = part + resposta;
        if (num > 0)
            resposta = sepMilhar + resposta;
    }
    if (sinal < 0)
        resposta = '-' + resposta;
    return resposta;
}

function calculateCrypto()
{
    var doge_am = parseFloat(parseFloat(document.getElementById("dogeamount").value.replace(",", ".")).toFixed(8));
    if (isNaN(doge_am))
        doge_am = 0;
    var btc_am = parseFloat(parseFloat(document.getElementById("btcamount").value.replace(",", ".")).toFixed(8));
    if (isNaN(btc_am))
        btc_am = 0;

    var temp1 = doge_am * doge_btc * btc_pln;
    document.getElementById("wartosc_doge").innerHTML = temp1.toFixed(4).toString().replace(".", ",") + " zł";
    var temp2 = btc_am * btc_pln;
    document.getElementById("wartosc_btc").innerHTML = temp2.toFixed(4).toString().replace(".", ",") + " zł";
    var pom = temp1 + temp2;
    var pom = formatFloat(pom, 2, ',', ' ').toString().replace(".", ",");
    document.getElementById("wartosc_krypto").innerHTML = pom.toString().replace(".", ",") + " zł";
}


function calculateDoge()
{
    var doge_am = parseFloat(parseFloat(document.getElementById("dogeamount").value.replace(",", ".")).toFixed(8));
    if (isNaN(doge_am))
        doge_am = 0;

    var temp1 = doge_am * doge_btc * btc_pln;
    var pom = formatFloat(temp1, 3, 9, ' ').toString().replace(".", ",");

    document.getElementById("wartosc_doge").innerHTML = "| wartość: " + pom + " zł";
}
function calculateDoge2()
{
    var doge_am = parseFloat(parseFloat(document.getElementById("dogeamount2").value.replace(",", ".")).toFixed(8));
    if (isNaN(doge_am))
        doge_am = 0;

    var temp1 = doge_am * doge_btc * btc_pln;
    document.getElementById("wartosc_doge2").innerHTML = "| wartość: " + temp1.toFixed(2).toString().replace(".", ",") + " zł";
}

function calculateBuy(exFee, mPrecision, bPrecision, ePrecision)
{
    var buyAmount = parseFloat(parseFloat(document.getElementById("dogeamount").value.replace(",", ".")).toFixed(mPrecision));
    var exRate = parseFloat(parseFloat(document.getElementById("dogeprice").value.replace(",", ".")).toFixed(ePrecision));
    var calc = parseFloat(parseFloat((buyAmount * exRate) + exFee).toFixed(bPrecision));
    var temp = isNaN(calc) ? "" : calc.toString();
    document.getElementById("price").value = temp.replace(".", ",");
}

function calculateSell(exFee, mPrecision, bPrecision, ePrecision)
{

    var sellAmount = parseFloat(parseFloat(document.getElementById("dogeamount2").value.replace(",", ".")).toFixed(mPrecision));
    var exRate = parseFloat(parseFloat(document.getElementById("dogeprice2").value.replace(",", ".")).toFixed(ePrecision));

    var calc = parseFloat(parseFloat((sellAmount * exRate) - exFee).toFixed(bPrecision));

    var temp = isNaN(calc) ? "" : calc.toString();
    document.getElementById("price2").value = temp.replace(".", ",");
}

function countChar(val, id, ile) {
    var len = val.value.length;
    var idik = '#counter' + id;
    if (len > ile) {
        val.value = val.value.substring(0, ile);
        countChar(val, id, ile);
    } else {
        $(idik).text(ile - len);
    }
}
//function calculateWithdrawal(currency, minFee, precision)
//{
//    var amount = parseFloat(parseFloat(document.getElementById("amount-" + currency).value).toFixed(precision));
//    var fee = parseFloat(parseFloat(document.getElementById("txFee-" + currency).value).toFixed(precision));
//    fee = Math.max(isNaN(fee) ? 0 : fee, parseFloat(minFee));
//
//    var calc = parseFloat(parseFloat(amount + fee).toFixed(precision));
//
//    var temp = isNaN(calc) ? "" : calc.toString();
//    document.getElementById("totalFunds-" + currency).value = temp;
//}

