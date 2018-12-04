CREATE TABLE 'users' (
    'Username' varchar(255) NOT NULL,
    'Password' text NOT NULL,
    'Attempts' int(11) NOT NULL DEFAULT 0,
    PRIMARY KEY ('Username')
);

INSERT INTO 'users' ('Username', 'Password') VALUES
(lagrot01, '$2y$10$Gkq9vZiwVkwL8DoM0Z.ax.Ux34CpaL54/8/KWKtMvMYzvgaSRQtoy'),
(mmina001, '$2y$10$QOOcMpIqplqdrfyL8PfxFuA77rL8LNBJ9KvA4EBi6rga5Is3nQNYC');


CREATE TABLE 'PV_Table' (
    'ID' int(11) NOT NULL AUTO_INCREMENT,
    'Name' varchar(255) NOT NULL,
    'Photo' text NULL,
    'Address' varchar(255) NOT NULL,
    'Coordinate_X' double NOT NULL,
    'Coordinate_Y' double NOT NULL,
    'Operator' varchar(255) NOT NULL,
    'CommissionDate' date NOT NULL,
    'Description' text NOT NULL,
    'SystemPower' double NOT NULL,
    'AnnualProduction' double NOT NULL,
    'CO2Avoided' double NOT NULL,
    'Reimbursement' double NOT NULL,
    'SolarPanelModules' varchar(255) NOT NULL,
    'AzimuthAngle' int(11) NOT NULL,
    'InclinationAngle' int(11) NOT NULL,
    'Communication' varchar(255) NOT NULL,
    'Inverter' text NOT NULL,
    'Sensors' int NOT NULL,
    PRIMARY KEY ('PV_Table')
);

INSERT INTO 'PV_Table' ('ID', 'Name', 'Photo', 'Address', 'Coordinate_X', 'Coordinate_Y', 'Operator', 'CommissionDate', 'Description', 'SystemPower', 'AnnualProduction', 'CO2Avoided','Reimbursement', 'SolarPanelModules', 'AzimuthAngle', 'InclinationAngle', 'Communication', 'Inverter','Sensors' ) VALUES
(1, 'ABC', '', 'Panepistimiou', -0.09, 51.5, 'ABC', '2017-12-12', 'ABC Energy', 9.4, 11540, 8.4, 65000.0, 'ReneSola', 0, 15, 'Sunny WebBox mit Bluetooth', 'Sunny tripower', 12),
(2, 'XYZ', '', 'Nicosia', -0.08, 52.5, 'XYZ', '2018-01-01', 'XYZ Energy', 5.7, 8540, 9.4, 45000.0, 'ReneSola', 5, 17, 'Sunny WebBox mit Bluetooth', 'Sunny tripower', 9);