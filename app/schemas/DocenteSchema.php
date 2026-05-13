<?php
class DocenteSchema {
    public static function validateCreate(array $data): array {
        $errors =[];
        $requiredFields = [
            'nombre', 'apaterno', 'direccion', 'telefono', 'ciudad', 'estado', 'usuario', 'password'
        ];

        foreach($requiredFields as $field) {
            if(!isset($data[$field]) || trim((string)$data[$field]) == '') {
                $errors[$field] = "El campo {$field} es obligatorio.";
            }
        }

        if(isset($data['telefono']) && strlen((string)$data['telefono']) < 10) {
            $errors['telefono'] = "El telefono debe tener al menos 10 caracteres";
        }

        if(isset($data['usuario']) && strlen((string)$data['usuario']) < 4) {
            $errors['usuario'] = "El usuario debe de tener al menos 4 caracteres";
        }

        if(isset($data['password']) && strlen((string)$data['password']) < 6) {
            $errors['password'] = "La contraseña debe tener al menos 6 caracteres";
        }

        return $errors;
    }

    public static function validateUpdated(array $data): array {
        $errors =[];

        if(isset($data['nombre']) && strlen((string)$data['nombre']) === 0) {
            $errors['nombre'] = "El nombre no puede estar vacío";
        }

        if(isset($data['apaterno']) && strlen((string)$data['apaterno']) === 0) {
            $errors['apaterno'] = "El apellido paterno no puede estar vacío";
        }

        if(isset($data['telefono']) && strlen((string)$data['telefono']) < 10) {
            $errors['telefono'] = "El telefono debe tener al menos 10 caracteres";
        }

        if(isset($data['usuario']) && strlen((string)$data['usuario']) < 4) {
            $errors['usuario'] = "El usuario debe de tener al menos 4 caracteres";
        }

        if(isset($data['password']) && strlen((string)$data['password']) < 6) {
            $errors['password'] = "La contraseña debe tener al menos 6 caracteres";
        }

        if(isset($data['activo']) && !is_bool($data['activo'])) {
            $errors['activo'] = "El campo activo debe booleano";
        }

        return $errors;
    }
}
?>