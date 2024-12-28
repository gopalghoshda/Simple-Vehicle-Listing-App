namespace App\Classes;

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function addVehicle($data) {
        $vehicles = $this->readData();
        $vehicles[] = $data;
        $this->writeData($vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readData();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeData($vehicles);
        }
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readData();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->writeData(array_values($vehicles));
        }
    }

    public function getVehicles() {
        return $this->readData();
    }

    public function getDetails() {
        return "Name: $this->name, Type: $this->type, Price: $this->price, Image: $this->image";
    }
}
