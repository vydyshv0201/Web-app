let Currents = 0;
let FlagNewNum = false;
let FlagFrac = 0;
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
    let Readout2 = Readout;
    if (Readout >= 0.1 && Readout < 1) {
        Readout *= 10;
        FlagFrac++;
    }
    if (FlagNewNum && PendingOp != "=") {
        $('#display').val(Currents);
    } else {
        FlagNewNum = true;
        if ('+' == PendingOp) {
            if (FlagFrac == 1 && Readout2 >= 0.1 && Readout2 < 1)
                Readout = Readout / 10;
            else if (FlagFrac == 1)
                Currents = Currents / 10;
            Currents += parseFloat(Readout);
            if (FlagFrac == 2)
                Currents = Currents / 10;
            $('#display').val(Currents);
            FlagFrac = 0;
        } else if ('-' == PendingOp) {
            if (FlagFrac == 1 && Readout2 >= 0.1 && Readout2 < 1)
                Readout = Readout / 10;
            else if (FlagFrac == 1)
                Currents = Currents / 10;
            Currents -= parseFloat(Readout);
            if (FlagFrac == 2)
                Currents = Currents / 10;
            $('#display').val(Currents);
            FlagFrac = 0;
        } else if ('/' == PendingOp) {
            Currents /= parseFloat(Readout);
            if (FlagFrac == 2)
                Currents = Currents / 100;
            else if (FlagFrac = 1)
                Currents = Currents / 10;
            $('#display').val(Currents);
            FlagFrac = 0;
        } else if ('*' == PendingOp) {
            Currents *= parseFloat(Readout);
            if (FlagFrac == 2)
                Currents = Currents / 100;
            else if (FlagFrac = 1)
                Currents = Currents / 10;
            $('#display').val(Currents);
            FlagFrac = 0;
        } else if ('^' == PendingOp) {
            if (FlagFrac == 1 && Readout2 >= 0.1 && Readout2 < 1)
                Readout = Readout / 10;
            else if (FlagFrac == 1)
                Currents = Currents / 10;
            if (FlagFrac == 2) {
                Currents = Currents / 10;
                Readout = Readout / 10;
            }
            Currents **= parseFloat(Readout);
            $('#display').val(Currents);
            FlagFrac = 0;
        } else {
            Currents = parseFloat(Readout);
        }
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