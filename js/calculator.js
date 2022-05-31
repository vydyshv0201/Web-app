let Currents = 0;
let FlagNewNum = false;
let PendingOp = "";

function NumPressed(Num) {
    if (FlagNewNum) {
        $('#display').val(Num);
        FlagNewNum = false;
    } else {
        if ($('#display').val() == "0")
            $('#display').val(Num);
        else
            $('#display').val($('#display').val() + Num);
    }
}

function Operation(Op) {
    let Readout = $('#display').val();
    if (FlagNewNum && PendingOp != "=") {
        $('#display').val(Currents);
    } else {
        FlagNewNum = true;
        if ('+' == PendingOp)
            Currents += parseFloat(Readout);
        else if ('-' == PendingOp)
            Currents -= parseFloat(Readout);
        else if ('/' == PendingOp)
            Currents /= parseFloat(Readout);
        else if ('*' == PendingOp)
            Currents *= parseFloat(Readout);
        else if ('^' == PendingOp)
            Currents **= parseFloat(Readout);
        else
            Currents = parseFloat(Readout);
        $('#display').val(Currents);
        PendingOp = Op;
    }
}

function Decimal() {
    var curReadOut = $('#display').val();
    if (FlagNewNum) {
        curReadOut = "0.";
        FlagNewNum = false;
    } else {
        if (curReadOut.indexOf(".") == -1)
            curReadOut += ".";
    }
    $('#display').val(curReadOut);
}

function ClearEntry() {
    $('#display').val("0");
    FlagNewNum = true;
}

function Clear() {
    Currents = 0;
    PendingOp = "";
    ClearEntry();

}

function Neg() {
    $('#display').val(parseFloat($('#display').val()) * -1);
}