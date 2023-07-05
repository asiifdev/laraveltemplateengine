<?php

namespace Database\Seeders;

use App\Models\MigrationForm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = getTableColumns();
        foreach ($table as $key => $item) {
            // $migration = DB::select("SELECT * FROM migrations WHERE migration LIKE %_create_'$key'_table");
            $migration = DB::table('migrations')->where('migration', 'LIKE', "%_create_" . $key . "_table")->first();
            foreach ($item as $value) {
                if ($migration != NULL) {
                    $array = [
                        "name" => $key,
                        "migration_name" => $migration->migration,
                        "migration_id" => $migration->id,
                        "column" => $value->Field,
                        "type" => $value->Type,
                        "nullable" => $value->Null == "NO" ? false : true,
                        "default" => $value->Default ? $value->Default : "",
                        "extra" => $value->Extra ? $value->Extra : "",
                    ];
                    if (mb_substr($value->Type, 0, 4) == "enum") {
                        $enum = str_replace("enum", "", $value->Type);
                        $array['type'] = "enum";
                        $array['enum'] = json_encode(explode(",", str_replace(str_split("'()'"), "", $enum)));
                        // dd($array);
                    }
                }
                // dd($array);
                MigrationForm::create($array);
            }
        }
    }
}
