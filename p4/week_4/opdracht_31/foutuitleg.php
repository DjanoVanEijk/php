/*
UPDATE jouw_tabel
SET titel = 'Test'

is fout omdat er geen WHERE clause is, hierdoor worden alle records in de tabel aangepast.

De correcte query zou zijn:
UPDATE jouw_tabel
SET titel = 'Test'
WHERE id = 1
*/