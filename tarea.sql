SELECT * FROM usuario WHERE usuario_activo = 0;
 
SELECT COUNT(*) AS cantidad_usuarios FROM usuario;
 
SELECT usua.*, grup.nombre AS nombre_grupo
FROM usuario usua
INNER JOIN usuario_grupo grup ON usua.id_grupo_usu = grup.id;
 
SELECT grup.*, COUNT(usua.id_grupo_usu) AS cantidad_usuarios
FROM usuario_grupo grup
LEFT JOIN usuario usua ON grup.id = u.id_grupo_usu
GROUP BY grup.id;