<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSgmRespostasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sgm_respostas', function(Blueprint $table)
		{
			$table->foreign('fk_estudante', 'fk_sgm_respostas_sgm_estudantes1')->references('id_estudante')->on('sgm_estudantes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('fk_pergunta', 'fk_sgm_respostas_sgm_perguntas1')->references('id_pergunta')->on('sgm_perguntas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sgm_respostas', function(Blueprint $table)
		{
			$table->dropForeign('fk_sgm_respostas_sgm_estudantes1');
			$table->dropForeign('fk_sgm_respostas_sgm_perguntas1');
		});
	}

}