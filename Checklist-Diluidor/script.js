document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('submit', function(event) {
        event.preventDefault();

        // Captura os valores dos inputs
        const observacao = document.querySelector('textarea[placeholder="Observação"]').value;
        const dtinst = document.querySelector('input[placeholder="Data de instalação"]').value;
        const hor = document.querySelector('input[placeholder="Horário"]').value;
        const nomeCliente = document.querySelector('input[placeholder="Nome do Cliente"]').value;
        const codigoCliente = document.querySelector('input[placeholder="Código do Cliente"]').value;
        const vendedor = document.querySelector('input[placeholder="Vendedor"]').value;
        const contatoInstalacao = document.querySelector('input[placeholder="Contato na instalação"]').value;
        const clienteNovo = document.querySelector('input[name="option"][value="1"]').checked;
        const clienteExistente = document.querySelector('input[name="option"][value="2"]').checked;
        const tensao110v = document.querySelector('input[name="option2"][value="3"]').checked;
        const tensao220v = document.querySelector('input[name="option2"][value="4"]').checked;
        const conexao34 = document.querySelector('input[name="option3"][value="5"]').checked;
        const conexao12 = document.querySelector('input[name="option3"][value="6"]').checked;
        const disthidr = document.getElementById('disthidr').value;
        const distelet = document.getElementById('distelet').value;
        const PCBs = document.querySelector('input[name="option4"][value="7"]').checked;
        const PCBn = document.querySelector('input[name="option4"][value="8"]').checked;
        const entrAd = document.querySelector('input[name="option5"][value="9"]').checked;
        const entrAe = document.querySelector('input[name="option5"][value="10"]').checked;
        const entrEd = document.querySelector('input[name="option6"][value="11"]').checked;
        const entrEe = document.querySelector('input[name="option6"][value="12"]').checked;
        const medpar1 = document.getElementById('medpar1').value;
        const medpar2 = document.getElementById('medpar2').value;

        //Equipamento 1
        const tiprod1_a = document.querySelector('input[name="option7"][value="13"]').checked;
        const tiprod1_b = document.querySelector('input[name="option7"][value="14"]').checked;
        const tiprod1_c = document.querySelector('input[name="option7"][value="15"]').checked;
        const set1 = document.getElementById('set1').value;
        const prodeq1 = document.getElementById('prodeq1').value;
        const galao1_a = document.querySelector('input[name="option8"][value="16"]').checked;
        const galao1_b = document.querySelector('input[name="option8"][value="17"]').checked;
        const galao1_c = document.querySelector('input[name="option8"][value="18"]').checked;
        const qtdm1 = document.getElementById('qtdm1').value;
        const desconto1 = document.getElementById('desconto1').value;
        const dil1 = document.getElementById('dil1').value;
        const bh1_a= document.querySelector('input[name="option9"][value="19"]').checked;
        const bh1_b = document.querySelector('input[name="option9"][value="20"]').checked;
        const ms1_a= document.querySelector('input[name="option10"][value="21"]').checked;
        const ms1_b = document.querySelector('input[name="option10"][value="22"]').checked;
        const sp1_a= document.querySelector('input[name="option11"][value="23"]').checked;
        const sp1_b = document.querySelector('input[name="option11"][value="24"]').checked;
        const mang1 = document.getElementById('mang1').value;

        let selectedValue;
        let selectedValueBb;

        if (galao1_a) {
            selectedValueBb = '5L';
        } else if (galao1_b) {
            selectedValueBb = '20L';
        } else if (galao1_c) {
            selectedValueBb = '50L';
        }

        if (tiprod1_a) {
            selectedValue = 'Diluidor';
        } else if (tiprod1_b) {
            selectedValue = 'Protuin';
        } else if (tiprod1_c) {
            selectedValue = 'Dosador';
        }

        //Equipamento 2

        const tiprod2_a = document.querySelector('input[name="option12"][value="25"]').checked;
        const tiprod2_b = document.querySelector('input[name="option12"][value="26"]').checked;
        const tiprod2_c = document.querySelector('input[name="option12"][value="27"]').checked;
        const set2 = document.getElementById('set2').value;
        const prodeq2 = document.getElementById('prodeq2').value;
        const galao2_a = document.querySelector('input[name="option13"][value="28"]').checked;
        const galao2_b = document.querySelector('input[name="option13"][value="29"]').checked;
        const galao2_c = document.querySelector('input[name="option13"][value="30"]').checked;
        const qtdm2 = document.getElementById('qtdm2').value;
        const desconto2 = document.getElementById('desconto2').value;
        const dil2 = document.getElementById('dil2').value;
        const bh2_a= document.querySelector('input[name="option14"][value="31"]').checked;
        const bh2_b = document.querySelector('input[name="option14"][value="32"]').checked;
        const ms2_a= document.querySelector('input[name="option15"][value="33"]').checked;
        const ms2_b = document.querySelector('input[name="option15"][value="34"]').checked;
        const sp2_a= document.querySelector('input[name="option16"][value="35"]').checked;
        const sp2_b = document.querySelector('input[name="option16"][value="36"]').checked;
        const mang2 = document.getElementById('mang2').value;


        let selectedValue2;
        let selectedValueBb2;

        if (galao2_a) {
            selectedValueBb2 = '5L';
        } else if (galao2_b) {
            selectedValueBb2 = '20L';
        } else if (galao2_c) {
            selectedValueBb2 = '50L';
        }

        if (tiprod2_a) {
            selectedValue2 = 'Diluidor';
        } else if (tiprod2_b) {
            selectedValue2 = 'Protuin';
        } else if (tiprod2_c) {
            selectedValue2 = 'Dosador';
        }

        //Equipamento 3

        const tiprod3_a = document.querySelector('input[name="option17"][value="37"]').checked;
        const tiprod3_b = document.querySelector('input[name="option17"][value="38"]').checked;
        const tiprod3_c = document.querySelector('input[name="option17"][value="39"]').checked;
        const set3 = document.getElementById('set3').value;
        const prodeq3 = document.getElementById('prodeq3').value;
        const galao3_a = document.querySelector('input[name="option18"][value="40"]').checked;
        const galao3_b = document.querySelector('input[name="option18"][value="41"]').checked;
        const galao3_c = document.querySelector('input[name="option18"][value="42"]').checked;
        const qtdm3 = document.getElementById('qtdm3').value;
        const desconto3 = document.getElementById('desconto3').value;
        const dil3 = document.getElementById('dil3').value;
        const bh3_a= document.querySelector('input[name="option19"][value="43"]').checked;
        const bh3_b = document.querySelector('input[name="option19"][value="44"]').checked;
        const ms3_a= document.querySelector('input[name="option20"][value="45"]').checked;
        const ms3_b = document.querySelector('input[name="option20"][value="46"]').checked;
        const sp3_a= document.querySelector('input[name="option21"][value="47"]').checked;
        const sp3_b = document.querySelector('input[name="option21"][value="48"]').checked;
        const mang3 = document.getElementById('mang3').value;

        let selectedValue3;
        let selectedValueBb3;

        if (galao3_a) {
            selectedValueBb3 = '5L';
        } else if (galao3_b) {
            selectedValueBb3 = '20L';
        } else if (galao3_c) {
            selectedValueBb3 = '50L';
        }

        if (tiprod3_a) {
            selectedValue3 = 'Diluidor';
        } else if (tiprod3_b) {
            selectedValue3 = 'Protuin';
        } else if (tiprod3_c) {
            selectedValue3 = 'Dosador';
        }

        //Equipamento 4

        const tiprod4_a = document.querySelector('input[name="option22"][value="49"]').checked;
        const tiprod4_b = document.querySelector('input[name="option22"][value="50"]').checked;
        const tiprod4_c = document.querySelector('input[name="option22"][value="51"]').checked;
        const set4 = document.getElementById('set4').value;
        const prodeq4 = document.getElementById('prodeq4').value;
        const galao4_a = document.querySelector('input[name="option23"][value="52"]').checked;
        const galao4_b = document.querySelector('input[name="option23"][value="53"]').checked;
        const galao4_c = document.querySelector('input[name="option23"][value="54"]').checked;
        const qtdm4 = document.getElementById('qtdm4').value;
        const desconto4 = document.getElementById('desconto4').value;
        const dil4 = document.getElementById('dil4').value;
        const bh4_a= document.querySelector('input[name="option24"][value="55"]').checked;
        const bh4_b = document.querySelector('input[name="option24"][value="56"]').checked;
        const ms4_a= document.querySelector('input[name="option25"][value="57"]').checked;
        const ms4_b = document.querySelector('input[name="option25"][value="58"]').checked;
        const sp4_a= document.querySelector('input[name="option26"][value="59"]').checked;
        const sp4_b = document.querySelector('input[name="option26"][value="60"]').checked;
        const mang4 = document.getElementById('mang4').value;

        let selectedValue4;
        let selectedValueBb4;

        if (galao4_a) {
            selectedValueBb4 = '5L';
        } else if (galao4_b) {
            selectedValueBb4 = '20L';
        } else if (galao4_c) {
            selectedValueBb4 = '50L';
        }

        if (tiprod4_a) {
            selectedValue4 = 'Diluidor';
        } else if (tiprod4_b) {
            selectedValue4 = 'Protuin';
        } else if (tiprod4_c) {
            selectedValue4 = 'Dosador';
        }

        //Equipamento 5

        const tiprod5_a = document.querySelector('input[name="option27"][value="61"]').checked;
        const tiprod5_b = document.querySelector('input[name="option27"][value="62"]').checked;
        const tiprod5_c = document.querySelector('input[name="option27"][value="63"]').checked;
        const set5 = document.getElementById('set5').value;
        const prodeq5 = document.getElementById('prodeq5').value;
        const galao5_a = document.querySelector('input[name="option28"][value="64"]').checked;
        const galao5_b = document.querySelector('input[name="option28"][value="65"]').checked;
        const galao5_c = document.querySelector('input[name="option28"][value="66"]').checked;
        const qtdm5 = document.getElementById('qtdm5').value;
        const desconto5 = document.getElementById('desconto5').value;
        const dil5 = document.getElementById('dil5').value;
        const bh5_a= document.querySelector('input[name="option29"][value="67"]').checked;
        const bh5_b = document.querySelector('input[name="option29"][value="68"]').checked;
        const ms5_a= document.querySelector('input[name="option30"][value="69"]').checked;
        const ms5_b = document.querySelector('input[name="option30"][value="70"]').checked;
        const sp5_a= document.querySelector('input[name="option31"][value="71"]').checked;
        const sp5_b = document.querySelector('input[name="option31"][value="72"]').checked;
        const mang5 = document.getElementById('mang5').value;

        let selectedValue5;
        let selectedValueBb5;

        if (galao5_a) {
            selectedValueBb5 = '5L';
        } else if (galao5_b) {
            selectedValueBb5 = '20L';
        } else if (galao5_c) {
            selectedValueBb5 = '50L';
        }

        if (tiprod5_a) {
            selectedValue5 = 'Diluidor';
        } else if (tiprod5_b) {
            selectedValue5 = 'Protuin';
        } else if (tiprod5_c) {
            selectedValue5 = 'Dosador';
        }

        //Equipamento 5

        const tiprod6_a = document.querySelector('input[name="option32"][value="73"]').checked;
        const tiprod6_b = document.querySelector('input[name="option32"][value="74"]').checked;
        const tiprod6_c = document.querySelector('input[name="option32"][value="75"]').checked;
        const set6 = document.getElementById('set6').value;
        const prodeq6 = document.getElementById('prodeq6').value;
        const galao6_a = document.querySelector('input[name="option33"][value="76"]').checked;
        const galao6_b = document.querySelector('input[name="option33"][value="77"]').checked;
        const galao6_c = document.querySelector('input[name="option33"][value="78"]').checked;
        const qtdm6 = document.getElementById('qtdm6').value;
        const desconto6 = document.getElementById('desconto6').value;
        const dil6 = document.getElementById('dil6').value;
        const bh6_a= document.querySelector('input[name="option34"][value="79"]').checked;
        const bh6_b = document.querySelector('input[name="option34"][value="80"]').checked;
        const ms6_a= document.querySelector('input[name="option35"][value="81"]').checked;
        const ms6_b = document.querySelector('input[name="option35"][value="82"]').checked;
        const sp6_a= document.querySelector('input[name="option36"][value="83"]').checked;
        const sp6_b = document.querySelector('input[name="option36"][value="84"]').checked;
        const mang6 = document.getElementById('mang6').value;

        let selectedValue6;
        let selectedValueBb6;

        if (galao6_a) {
            selectedValueBb6 = '5L';
        } else if (galao6_b) {
            selectedValueBb6 = '20L';
        } else if (galao6_c) {
            selectedValueBb6 = '50L';
        }

        if (tiprod6_a) {
            selectedValue6 = 'Diluidor';
        } else if (tiprod6_b) {
            selectedValue6 = 'Protuin';
        } else if (tiprod6_c) {
            selectedValue6 = 'Dosador';
        }



        // Captura os valores dos inputs de produto adicionados dinamicamente
        const productGroups = document.querySelectorAll('.product-group .product-item');
        const productValues = [];
        const checkboxValues = [];

        productGroups.forEach((group, index) => {
            const productInput = group.querySelector('.product-input');
            productValues.push(productInput.value);

            const checkboxes = group.querySelectorAll('.product-checkbox');
            let checkedValue = '';
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    checkedValue = checkbox.value;
                }
            });
            checkboxValues.push(checkedValue); 
        });

        // Carrega o arquivo de modelo usando fetch
        fetch('modelo2.xlsx')
            .then(response => response.arrayBuffer())
            .then(data => {
                const workbook = new ExcelJS.Workbook();
                return workbook.xlsx.load(data);
            })
            .then(workbook => {
                const worksheet = workbook.getWorksheet(1); // Obtém a primeira planilha

                // Preenche as células específicas com os dados do formulário
                worksheet.getCell('L5').value = observacao;
                worksheet.getCell('H8').value = dtinst;
                worksheet.getCell('S8').value = hor;
                worksheet.getCell('H9').value = nomeCliente;
                worksheet.getCell('W9').value = codigoCliente;
                worksheet.getCell('H10').value = vendedor;
                worksheet.getCell('H11').value = contatoInstalacao;
                worksheet.getCell('H12').value = clienteNovo ? 'X' : '';
                worksheet.getCell('P12').value = clienteExistente ? 'X' : '';
                worksheet.getCell('H14').value = tensao110v ? 'X' : '';
                worksheet.getCell('K14').value = tensao220v ? 'X' : '';
                worksheet.getCell('H15').value = conexao34 ? 'X' : '';
                worksheet.getCell('K15').value = conexao12 ? 'X' : '';
                worksheet.getCell('H16').value = disthidr + ",0m";
                worksheet.getCell('T16').value = distelet + ",0m";
                worksheet.getCell('B19').value = PCBs ? 'X' : '';
                worksheet.getCell('E19').value = PCBn ? 'X' : '';
                worksheet.getCell('M18').value = entrAd ? 'X' : '';
                worksheet.getCell('P18').value = entrAe ? 'X' : '';
                worksheet.getCell('M19').value = entrEd ? 'X' : '';
                worksheet.getCell('P19').value = entrEe ? 'X' : '';
                worksheet.getCell('V19').value = medpar1 + ",0m";
                worksheet.getCell('X19').value = medpar2 + ",0m";
                worksheet.getCell('P18').value = entrAe ? 'X' : '';
                worksheet.getCell('M19').value = entrEd ? 'X' : '';

                // Preenchimento Equipamento 1
                worksheet.getCell('B22').value = selectedValue;
                worksheet.getCell('B24').value = set1;
                worksheet.getCell('B26').value = prodeq1;
                worksheet.getCell('D28').value = selectedValueBb;
                worksheet.getCell('D29').value = qtdm1;
                worksheet.getCell('D30').value = desconto1;
                worksheet.getCell('B32').value = dil1;
                worksheet.getCell('C41').value = bh1_a ? 'X' : '';
                worksheet.getCell('E41').value = bh1_b ? 'X' : '';
                worksheet.getCell('C43').value = ms1_a ? 'X' : '';
                worksheet.getCell('E43').value = ms1_b ? 'X' : '';
                worksheet.getCell('C45').value = sp1_a ? 'X' : '';
                worksheet.getCell('E45').value = sp1_b ? 'X' : '';
                worksheet.getCell('B51').value = mang1;

                // Preenchimento Equipamento 2

                worksheet.getCell('F22').value = selectedValue2;
                worksheet.getCell('F24').value = set2;
                worksheet.getCell('F26').value = prodeq2;
                worksheet.getCell('H28').value = selectedValueBb2;
                worksheet.getCell('H29').value = qtdm2;
                worksheet.getCell('H30').value = desconto2;
                worksheet.getCell('F32').value = dil2;
                worksheet.getCell('G41').value = bh2_a ? 'X' : '';
                worksheet.getCell('I41').value = bh2_b ? 'X' : '';
                worksheet.getCell('G43').value = ms2_a ? 'X' : '';
                worksheet.getCell('I43').value = ms2_b ? 'X' : '';
                worksheet.getCell('G45').value = sp2_a ? 'X' : '';
                worksheet.getCell('I45').value = sp2_b ? 'X' : '';
                worksheet.getCell('F51').value = mang2;

                // Preenchimento Equipamento 3

                worksheet.getCell('J22').value = selectedValue3;
                worksheet.getCell('J24').value = set3;
                worksheet.getCell('J26').value = prodeq3;
                worksheet.getCell('L28').value = selectedValueBb3;
                worksheet.getCell('L29').value = qtdm3;
                worksheet.getCell('L30').value = desconto3;
                worksheet.getCell('J32').value = dil3;
                worksheet.getCell('K41').value = bh3_a ? 'X' : '';
                worksheet.getCell('M41').value = bh3_b ? 'X' : '';
                worksheet.getCell('K43').value = ms3_a ? 'X' : '';
                worksheet.getCell('M43').value = ms3_b ? 'X' : '';
                worksheet.getCell('K45').value = sp3_a ? 'X' : '';
                worksheet.getCell('M45').value = sp3_b ? 'X' : '';
                worksheet.getCell('J51').value = mang3;

                // Preenchimento Equipamento 4

                worksheet.getCell('N22').value = selectedValue4;
                worksheet.getCell('N24').value = set4;
                worksheet.getCell('N26').value = prodeq4;
                worksheet.getCell('P28').value = selectedValueBb4;
                worksheet.getCell('P29').value = qtdm4;
                worksheet.getCell('P30').value = desconto4;
                worksheet.getCell('N32').value = dil4;
                worksheet.getCell('O41').value = bh4_a ? 'X' : '';
                worksheet.getCell('Q41').value = bh4_b ? 'X' : '';
                worksheet.getCell('O43').value = ms4_a ? 'X' : '';
                worksheet.getCell('Q43').value = ms4_b ? 'X' : '';
                worksheet.getCell('O45').value = sp4_a ? 'X' : '';
                worksheet.getCell('Q45').value = sp4_b ? 'X' : '';
                worksheet.getCell('N51').value = mang4;

                // Preenchimento Equipamento 5

                worksheet.getCell('R22').value = selectedValue5;
                worksheet.getCell('R24').value = set5;
                worksheet.getCell('R26').value = prodeq5;
                worksheet.getCell('T28').value = selectedValueBb5;
                worksheet.getCell('T29').value = qtdm5;
                worksheet.getCell('T30').value = desconto5;
                worksheet.getCell('R32').value = dil5;
                worksheet.getCell('S41').value = bh5_a ? 'X' : '';
                worksheet.getCell('U41').value = bh5_b ? 'X' : '';
                worksheet.getCell('S43').value = ms5_a ? 'X' : '';
                worksheet.getCell('U43').value = ms5_b ? 'X' : '';
                worksheet.getCell('S45').value = sp5_a ? 'X' : '';
                worksheet.getCell('U45').value = sp5_b ? 'X' : '';
                worksheet.getCell('R51').value = mang5;

                // Preenchimento Equipamento 6

                worksheet.getCell('V22').value = selectedValue6;
                worksheet.getCell('V24').value = set6;
                worksheet.getCell('V26').value = prodeq6;
                worksheet.getCell('X28').value = selectedValueBb6;
                worksheet.getCell('X29').value = qtdm6;
                worksheet.getCell('X30').value = desconto6;
                worksheet.getCell('V32').value = dil6;
                worksheet.getCell('W41').value = bh6_a ? 'X' : '';
                worksheet.getCell('Y41').value = bh6_b ? 'X' : '';
                worksheet.getCell('W43').value = ms6_a ? 'X' : '';
                worksheet.getCell('Y43').value = ms6_b ? 'X' : '';
                worksheet.getCell('W45').value = sp6_a ? 'X' : '';
                worksheet.getCell('Y45').value = sp6_b ? 'X' : '';
                worksheet.getCell('V51').value = mang6;

                // Adiciona os valores dos produtos nas células específicas
                productValues.forEach((value, index) => {
                    worksheet.getCell(`D${index + 23}`).value = value;
                });

                // Adiciona os valores dos checkboxes nas células específicas
                checkboxValues.forEach((value, index) => {
                    worksheet.getCell(`I${index + 23}`).value = value;
                });

                // Adiciona a logo na célula B1
                return fetch('../assets/Logo2.jpg') // Caminho para a logo
                    .then(response => response.blob())
                    .then(blob => {
                        return new Promise((resolve, reject) => {
                            const reader = new FileReader();
                            reader.onload = () => resolve(reader.result);
                            reader.onerror = reject;
                            reader.readAsArrayBuffer(blob);
                        });
                    })
                    .then(buffer => {
                        const imageId = workbook.addImage({
                            buffer: buffer,
                            extension: 'jpg',
                        });

                        worksheet.addImage(imageId, {
                            tl: { col: 1.1, row: 1.1 },
                            ext: { width: 130, height: 80 }
                        });

                        // Salva o arquivo
                        return workbook.xlsx.writeBuffer();
                    });
            })
            .then(buffer => {
                const blob = new Blob([buffer], { type: "application/octet-stream" });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = ('dados_cliente_' +nomeCliente +'.xlsx');
                link.click();
            })
            .catch(error => console.error('Erro ao carregar o modelo:', error));
    });
});
