var data = [
    1,
    4,
    6,
    2,
    6,
    8,
    9,
    21,
    20,
    14,
    3,
    6,
    11,
    1,
    1,
    2,
    3,
    4,
    6,
    8,
    9,
    2,
    1,
    5,
    2,
    5,
    6,
    8,
    3,
    2,
];
data.sort(function (a, b) {
    return b - a;
});
function checkOddArray(odd) {
    return odd % 2 === 1;
}
//console.log(data.filter(checkOddArray));
var arrayOdd = data.filter(checkOddArray);
console.log(`Nilai tertinggi pertama ${arrayOdd[0]}`);
console.log(`Nilai tertinggi kedua ${arrayOdd[1]}`);
console.log(`Nilai tertinggi ketiga ${arrayOdd[2]}`);
