# api_test_13052023

Problema: Criar um método para "Atualização de Estoque" que deve receber um JSON contendo um array de produtos a serem inseridos/atualizados.

Requisitos: PHP8,PDO,MYSQL

Estrutura MYSQL:

CREATE TABLE estoque (
	id INT UNSIGNED auto_increment NOT NULL,
	produto varchar(100) NOT NULL,
	cor varchar(100) NOT NULL,
	tamanho varchar(100) NOT NULL,
	deposito varchar(100) NOT NULL,
	data_disponibilidade DATE NOT NULL,
	quantidade INT UNSIGNED NOT NULL,
	CONSTRAINT estoque_pk PRIMARY KEY (id),
	CONSTRAINT estoque_un UNIQUE KEY (produto,cor,tamanho,deposito,data_disponibilidade)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb3
COLLATE=utf8mb3_general_ci;

Estrutura JSON: 
[
    {
        "produto": "10.01.0419",
        "cor": "00",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 15
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 2
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "M",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 4
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "G",
        "deposito": "1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 6
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-06-01",
        "quantidade": 8
    }
]
