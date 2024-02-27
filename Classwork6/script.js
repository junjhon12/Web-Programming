function hello_world() {
    alert('Hello, world!');
}

function triangle(size) {
    var str = '';
    for (var i = 0; i < size; i++) {
        str += '*';
    }
}
triangle(5);

function word_count(str) {
    return str.split(' ').length;
}
word_count('The quick brown fox jumps over the lazy dog.');

function countWords($str) {
    copy = [];
    $str = $str.split(' ');
    for (var i = 0; i < $str.length; i++) {
        if ($str[i] != '') {
            copy.push($str[i]);
        }
    }
}
countWords('The quick brown fox jumps over the lazy dog.');

function remove_all(str, char) {
    return str.split(char).join('');
}
remove_all("Summer is here!", 'e');