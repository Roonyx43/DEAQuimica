document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt14').addEventListener('change', function() {
        var prodHidDiv1 = document.getElementById ('prod-hid1');
        var prodHidDiv1_b = document.getElementById ('prod-hid1_b');
        var prodHidDiv1_c = document.getElementById ('prod-hid1_c');
        var prodHidDiv1_d = document.getElementById ('prod-hid1_d');
        var prodHidDiv1_e = document.getElementById ('prod-hid1_e');

        if (this.checked) {
            prodHidDiv1.style.display = 'block';
            prodHidDiv1_b.style.display = 'flex';
            prodHidDiv1_c.style.display = 'block';
            prodHidDiv1_d.style.display = 'block';
            prodHidDiv1_e.style.display = 'block';
        } else {
            prodHidDiv1.style.display = 'none';
            prodHidDiv1_b.style.display = 'none';
            prodHidDiv1_c.style.display = 'none';
            prodHidDiv1_d.style.display = 'none';
            prodHidDiv1_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv1, prodHidDiv1_b, prodHidDiv1_c, prodHidDiv1_d, prodHidDiv1_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt13').addEventListener('change', function() {
        var prodHidDiv1 = document.getElementById('prod-hid1');
        var prodHidDiv1_b = document.getElementById('prod-hid1_b');
        var prodHidDiv1_c = document.getElementById('prod-hid1_c');
        var prodHidDiv1_d = document.getElementById('prod-hid1_d');
        var prodHidDiv1_e = document.getElementById('prod-hid1_e');

        if (this.checked) {
            prodHidDiv1.style.display = 'none';
            prodHidDiv1_b.style.display = 'none';
            prodHidDiv1_c.style.display = 'none';
            prodHidDiv1_d.style.display = 'none';
            prodHidDiv1_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv1, prodHidDiv1_b, prodHidDiv1_c, prodHidDiv1_d, prodHidDiv1_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt15').addEventListener('change', function() {
        var prodHidDiv1 = document.getElementById ('prod-hid1');
        var prodHidDiv1_b = document.getElementById ('prod-hid1_b');
        var prodHidDiv1_c = document.getElementById ('prod-hid1_c');
        var prodHidDiv1_d = document.getElementById ('prod-hid1_d');
        var prodHidDiv1_e = document.getElementById ('prod-hid1_e');

        if (this.checked) {
            prodHidDiv1.style.display = 'none';
            prodHidDiv1_b.style.display = 'none';
            prodHidDiv1_c.style.display = 'none';
            prodHidDiv1_d.style.display = 'none';
            prodHidDiv1_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv1, prodHidDiv1_b, prodHidDiv1_c, prodHidDiv1_d, prodHidDiv1_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt26').addEventListener('change', function() {
        var prodHidDiv2 = document.getElementById ('prod-hid2');
        var prodHidDiv2_b = document.getElementById ('prod-hid2_b');
        var prodHidDiv2_c = document.getElementById ('prod-hid2_c');
        var prodHidDiv2_d = document.getElementById ('prod-hid2_d');
        var prodHidDiv2_e = document.getElementById ('prod-hid2_e');

        if (this.checked) {
            prodHidDiv2.style.display = 'block';
            prodHidDiv2_b.style.display = 'flex';
            prodHidDiv2_c.style.display = 'block';
            prodHidDiv2_d.style.display = 'block';
            prodHidDiv2_e.style.display = 'block';
        } else {
            prodHidDiv2.style.display = 'none';
            prodHidDiv2_b.style.display = 'none';
            prodHidDiv2_c.style.display = 'none';
            prodHidDiv2_d.style.display = 'none';
            prodHidDiv2_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv2, prodHidDiv2_b, prodHidDiv2_c, prodHidDiv2_d, prodHidDiv2_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
            
        }

    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt25').addEventListener('change', function() {
        var prodHidDiv2 = document.getElementById ('prod-hid2');
        var prodHidDiv2_b = document.getElementById ('prod-hid2_b');
        var prodHidDiv2_c = document.getElementById ('prod-hid2_c');
        var prodHidDiv2_d = document.getElementById ('prod-hid2_d');
        var prodHidDiv2_e = document.getElementById ('prod-hid2_e');

        if (this.checked) {
            prodHidDiv2.style.display = 'none';
            prodHidDiv2_b.style.display = 'none';
            prodHidDiv2_c.style.display = 'none';
            prodHidDiv2_d.style.display = 'none';
            prodHidDiv2_e.style.display = 'none';

             // Definindo o valor dos campos como vazio
             var fields = [prodHidDiv2, prodHidDiv2_b, prodHidDiv2_c, prodHidDiv2_d, prodHidDiv2_e];
             fields.forEach(function(field) {
                 var inputElements = field.getElementsByTagName('input');
                 for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
             });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt27').addEventListener('change', function() {
        var prodHidDiv2 = document.getElementById ('prod-hid2');
        var prodHidDiv2_b = document.getElementById ('prod-hid2_b');
        var prodHidDiv2_c = document.getElementById ('prod-hid2_c');
        var prodHidDiv2_d = document.getElementById ('prod-hid2_d');
        var prodHidDiv2_e = document.getElementById ('prod-hid2_e');

        if (this.checked) {
            prodHidDiv2.style.display = 'none';
            prodHidDiv2_b.style.display = 'none';
            prodHidDiv2_c.style.display = 'none';
            prodHidDiv2_d.style.display = 'none';
            prodHidDiv2_e.style.display = 'none';

                // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv2, prodHidDiv2_b, prodHidDiv2_c, prodHidDiv2_d, prodHidDiv2_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt38').addEventListener('change', function() {
        var prodHidDiv3 = document.getElementById ('prod-hid3');
        var prodHidDiv3_b = document.getElementById ('prod-hid3_b');
        var prodHidDiv3_c = document.getElementById ('prod-hid3_c');
        var prodHidDiv3_d = document.getElementById ('prod-hid3_d');
        var prodHidDiv3_e = document.getElementById ('prod-hid3_e');

        if (this.checked) {
            prodHidDiv3.style.display = 'block';
            prodHidDiv3_b.style.display = 'flex';
            prodHidDiv3_c.style.display = 'block';
            prodHidDiv3_d.style.display = 'block';
            prodHidDiv3_e.style.display = 'block';
        } else {
            prodHidDiv3.style.display = 'none';
            prodHidDiv3_b.style.display = 'none';
            prodHidDiv3_c.style.display = 'none';
            prodHidDiv3_d.style.display = 'none';
            prodHidDiv3_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv3, prodHidDiv3_b, prodHidDiv3_c, prodHidDiv3_d, prodHidDiv3_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt37').addEventListener('change', function() {
        var prodHidDiv3 = document.getElementById ('prod-hid3');
        var prodHidDiv3_b = document.getElementById ('prod-hid3_b');
        var prodHidDiv3_c = document.getElementById ('prod-hid3_c');
        var prodHidDiv3_d = document.getElementById ('prod-hid3_d');
        var prodHidDiv3_e = document.getElementById ('prod-hid3_e');

        if (this.checked) {
            prodHidDiv3.style.display = 'none';
            prodHidDiv3_b.style.display = 'none';
            prodHidDiv3_c.style.display = 'none';
            prodHidDiv3_d.style.display = 'none';
            prodHidDiv3_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv3, prodHidDiv3_b, prodHidDiv3_c, prodHidDiv3_d, prodHidDiv3_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt39').addEventListener('change', function() {
        var prodHidDiv3 = document.getElementById ('prod-hid3');
        var prodHidDiv3_b = document.getElementById ('prod-hid3_b');
        var prodHidDiv3_c = document.getElementById ('prod-hid3_c');
        var prodHidDiv3_d = document.getElementById ('prod-hid3_d');
        var prodHidDiv3_e = document.getElementById ('prod-hid3_e');

        if (this.checked) {
            prodHidDiv3.style.display = 'none';
            prodHidDiv3_b.style.display = 'none';
            prodHidDiv3_c.style.display = 'none';
            prodHidDiv3_d.style.display = 'none';
            prodHidDiv3_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv3, prodHidDiv3_b, prodHidDiv3_c, prodHidDiv3_d, prodHidDiv3_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt50').addEventListener('change', function() {
        var prodHidDiv4 = document.getElementById ('prod-hid4');
        var prodHidDiv4_b = document.getElementById ('prod-hid4_b');
        var prodHidDiv4_c = document.getElementById ('prod-hid4_c');
        var prodHidDiv4_d = document.getElementById ('prod-hid4_d');
        var prodHidDiv4_e = document.getElementById ('prod-hid4_e');

        if (this.checked) {
            prodHidDiv4.style.display = 'block';
            prodHidDiv4_b.style.display = 'flex';
            prodHidDiv4_c.style.display = 'block';
            prodHidDiv4_d.style.display = 'block';
            prodHidDiv4_e.style.display = 'block';
        } else {
            prodHidDiv4.style.display = 'none';
            prodHidDiv4_b.style.display = 'none';
            prodHidDiv4_c.style.display = 'none';
            prodHidDiv4_d.style.display = 'none';
            prodHidDiv4_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv3, prodHidDiv3_b, prodHidDiv3_c, prodHidDiv3_d, prodHidDiv3_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt49').addEventListener('change', function() {
        var prodHidDiv4 = document.getElementById ('prod-hid4');
        var prodHidDiv4_b = document.getElementById ('prod-hid4_b');
        var prodHidDiv4_c = document.getElementById ('prod-hid4_c');
        var prodHidDiv4_d = document.getElementById ('prod-hid4_d');
        var prodHidDiv4_e = document.getElementById ('prod-hid4_e');

        if (this.checked) {
            prodHidDiv4.style.display = 'none';
            prodHidDiv4_b.style.display = 'none';
            prodHidDiv4_c.style.display = 'none';
            prodHidDiv4_d.style.display = 'none';
            prodHidDiv4_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv4, prodHidDiv4_b, prodHidDiv4_c, prodHidDiv4_d, prodHidDiv4_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt51').addEventListener('change', function() {
        var prodHidDiv4 = document.getElementById ('prod-hid4');
        var prodHidDiv4_b = document.getElementById ('prod-hid4_b');
        var prodHidDiv4_c = document.getElementById ('prod-hid4_c');
        var prodHidDiv4_d = document.getElementById ('prod-hid4_d');
        var prodHidDiv4_e = document.getElementById ('prod-hid4_e');

        if (this.checked) {
            prodHidDiv4.style.display = 'none';
            prodHidDiv4_b.style.display = 'none';
            prodHidDiv4_c.style.display = 'none';
            prodHidDiv4_d.style.display = 'none';
            prodHidDiv4_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv4, prodHidDiv4_b, prodHidDiv4_c, prodHidDiv4_d, prodHidDiv4_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
            
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt62').addEventListener('change', function() {
        var prodHidDiv5 = document.getElementById ('prod-hid5');
        var prodHidDiv5_b = document.getElementById ('prod-hid5_b');
        var prodHidDiv5_c = document.getElementById ('prod-hid5_c');
        var prodHidDiv5_d = document.getElementById ('prod-hid5_d');
        var prodHidDiv5_e = document.getElementById ('prod-hid5_e');

        if (this.checked) {
            prodHidDiv5.style.display = 'block';
            prodHidDiv5_b.style.display = 'flex';
            prodHidDiv5_c.style.display = 'block';
            prodHidDiv5_d.style.display = 'block';
            prodHidDiv5_e.style.display = 'block';
        } else {
            prodHidDiv5.style.display = 'none';
            prodHidDiv5_b.style.display = 'none';
            prodHidDiv5_c.style.display = 'none';
            prodHidDiv5_d.style.display = 'none';
            prodHidDiv5_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv5, prodHidDiv5_b, prodHidDiv5_c, prodHidDiv5_d, prodHidDiv5_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt61').addEventListener('change', function() {
        var prodHidDiv5 = document.getElementById ('prod-hid5');
        var prodHidDiv5_b = document.getElementById ('prod-hid5_b');
        var prodHidDiv5_c = document.getElementById ('prod-hid5_c');
        var prodHidDiv5_d = document.getElementById ('prod-hid5_d');
        var prodHidDiv5_e = document.getElementById ('prod-hid5_e');

        if (this.checked) {
            prodHidDiv5.style.display = 'none';
            prodHidDiv5_b.style.display = 'none';
            prodHidDiv5_c.style.display = 'none';
            prodHidDiv5_d.style.display = 'none';
            prodHidDiv5_e.style.display = 'none';

            // Definindo o valor dos campos como vazio
            var fields = [prodHidDiv5, prodHidDiv5_b, prodHidDiv5_c, prodHidDiv5_d, prodHidDiv5_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
        });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt63').addEventListener('change', function() {
        var prodHidDiv5 = document.getElementById ('prod-hid5');
        var prodHidDiv5_b = document.getElementById ('prod-hid5_b');
        var prodHidDiv5_c = document.getElementById ('prod-hid5_c');
        var prodHidDiv5_d = document.getElementById ('prod-hid5_d');
        var prodHidDiv5_e = document.getElementById ('prod-hid5_e');

        if (this.checked) {
            prodHidDiv5.style.display = 'none';
            prodHidDiv5_b.style.display = 'none';
            prodHidDiv5_c.style.display = 'none';
            prodHidDiv5_d.style.display = 'none';
            prodHidDiv5_e.style.display = 'none';

            var fields = [prodHidDiv5, prodHidDiv5_b, prodHidDiv5_c, prodHidDiv5_d, prodHidDiv5_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt74').addEventListener('change', function() {
        var prodHidDiv6 = document.getElementById ('prod-hid6');
        var prodHidDiv6_b = document.getElementById ('prod-hid6_b');
        var prodHidDiv6_c = document.getElementById ('prod-hid6_c');
        var prodHidDiv6_d = document.getElementById ('prod-hid6_d');
        var prodHidDiv6_e = document.getElementById ('prod-hid6_e');

        if (this.checked) {
            prodHidDiv6.style.display = 'block';
            prodHidDiv6_b.style.display = 'flex';
            prodHidDiv6_c.style.display = 'block';
            prodHidDiv6_d.style.display = 'block';
            prodHidDiv6_e.style.display = 'block';
        } else {
            prodHidDiv6.style.display = 'none';
            prodHidDiv6_b.style.display = 'none';
            prodHidDiv6_c.style.display = 'none';
            prodHidDiv6_d.style.display = 'none';
            prodHidDiv6_e.style.display = 'none';

            var fields = [prodHidDiv6, prodHidDiv6_b, prodHidDiv6_c, prodHidDiv6_d, prodHidDiv6_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt73').addEventListener('change', function() {
        var prodHidDiv6 = document.getElementById ('prod-hid6');
        var prodHidDiv6_b = document.getElementById ('prod-hid6_b');
        var prodHidDiv6_c = document.getElementById ('prod-hid6_c');
        var prodHidDiv6_d = document.getElementById ('prod-hid6_d');
        var prodHidDiv6_e = document.getElementById ('prod-hid6_e');

        if (this.checked) {
            prodHidDiv6.style.display = 'none';
            prodHidDiv6_b.style.display = 'none';
            prodHidDiv6_c.style.display = 'none';
            prodHidDiv6_d.style.display = 'none';
            prodHidDiv6_e.style.display = 'none';

            var fields = [prodHidDiv6, prodHidDiv6_b, prodHidDiv6_c, prodHidDiv6_d, prodHidDiv6_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opt75').addEventListener('change', function() {
        var prodHidDiv6 = document.getElementById ('prod-hid6');
        var prodHidDiv6_b = document.getElementById ('prod-hid6_b');
        var prodHidDiv6_c = document.getElementById ('prod-hid6_c');
        var prodHidDiv6_d = document.getElementById ('prod-hid6_d');
        var prodHidDiv6_e = document.getElementById ('prod-hid6_e');

        if (this.checked) {
            prodHidDiv6.style.display = 'none';
            prodHidDiv6_b.style.display = 'none';
            prodHidDiv6_c.style.display = 'none';
            prodHidDiv6_d.style.display = 'none';
            prodHidDiv6_e.style.display = 'none';

            var fields = [prodHidDiv6, prodHidDiv6_b, prodHidDiv6_c, prodHidDiv6_d, prodHidDiv6_e];
            fields.forEach(function(field) {
                var inputElements = field.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    if (inputElements[i].type === 'checkbox') {
                        inputElements[i].checked = false; // Desmarcar a checkbox
                    } else {
                        inputElements[i].value = ''; // Limpar outros tipos de campos
                    }
                }
            });
        }
    });
});