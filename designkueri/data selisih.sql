select * from (
select siswa2,siswa, abs(t_nilai-t_nilai2) as selisih from (
	select * from (
		select tb_nilai.siswa, sum(tb_nilai.nilai) as t_nilai from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='1' and
			tb_siswa.thn_masuk='2011'                
		group by
			tb_nilai.siswa
		order by tb_nilai.siswa asc
	) as tbb
	
	left join  (
		select tb_nilai.siswa as siswa2, sum(tb_nilai.nilai) as t_nilai2 from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='1' and
			tb_siswa.thn_masuk='2011'                
		group by
			tb_nilai.siswa
		order by tb_nilai.siswa asc
	) as tbb2
	
	on tbb2.siswa2 < tbb.siswa

) as tbbb
where 
siswa2 is not Null
and
siswa is not Null
order by siswa2,siswa
) as tbf

