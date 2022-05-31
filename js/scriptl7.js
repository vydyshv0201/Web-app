let text = "";

function ButtonClick() {
  let random = Math.floor(Math.random() * 10);
  text = text + random;
  alert(random);
  console.log(random);
  $('#textarea1').val(text);

}

function ButtonClick1() {
  let a = Number($('#value_a').val());
  let b = Number($('#value_b').val());
  let c = a+b;
  alert(a + " + " + b + " = " + c);
}