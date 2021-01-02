function hitungUangKembalian(uang1, uang2) {
  console.log(`Uang dibayar : ${uang1}`);
  console.log(`Total bayar : ${uang2}`);
  var kembalian = uang1 - uang2;
  if (kembalian > 0) {
    return console.log(`Kemablian : ${kembalian}`);
  } else {
    return console.log("format salah");
  }
}

hitungUangKembalian(200000, 146000);
