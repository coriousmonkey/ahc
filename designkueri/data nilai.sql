select * from (
		select tb_nilai.siswa, sum(tb_nilai.nilai) as t_nilai from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='1' and
			tb_siswa.thn_masuk='2011'                
		group by
			tb_nilai.siswa
		order by t_nilai asc
		) as tbv
		where t_nilai >= 351