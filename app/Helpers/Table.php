<?php

namespace App\Helpers;

class Table
{


    private $table = "";

    public function createTable()
    {
        return $this->table;
    }

    public function addOptions(array $options)
    {
        $attribut = "";
        foreach ($options as $key => $value) {
            $attribut = "$key = '$value' ";
        }
        return $attribut;
    }

    public function beginTable(array $options = []): self
    {
        $this->table .= "<table ";
        $this->table .= "{$this->addOptions($options)} >";

        return $this;
    }


    public function thead(): self
    {
        $this->table .= "<thead > <tr>";

        return $this;
    }

    public function endThead(): self
    {
        $this->table .= " </th> </thead>";

        return $this;
    }



    public function theadElement(array $elements, array $options = []): self
    {
        for ($i = 0; $i < count($elements); $i++) {

            $this->table .= "<th scope= 'col' ";
            $this->table .= $options ? $this->addOptions($options) . '>' : '>';
            $this->table .= "{$elements[$i]} </th>";
        }
        return $this;
    }

    public function tbody(): self
    {
        $this->table .= "<tbody > <tr>";

        return $this;
    }

    public function tbodyElement(array $elements, array $options = [], array $buttons = []): self
    {
        for ($i = 0; $i < count($elements); $i++) {
            $this->table .= "<tr>";
            for ($y = 0; $y < count($elements[$i]); $y++) {

                $this->table .= "<td scope= 'col' ";
                $this->table .= $options ? $this->addOptions($options) . '>' : '>';
                $this->table .= $elements[$i][$y] ? $elements[$i][$y] : "a metre a jour  </td>";
            }
            if ($buttons !== null) {
                $this->table .= "<td>";

                foreach ($buttons[$i] as $key) {
                    $color = $key['color'];
                    $url = $key['path'];
                    $name = $key['name'];

                    $this->table .= "<a style='font-size:13px' class='btn btn-$color mx-1' href='$url'> $name </a>";
                }
                $this->table .= "</td>";
            }
        }
        return $this;
    }

    public function closeTrTbody()
    {
        $this->table .= "</tr>";
        return $this;
    }


    public function endTbody(): self
    {
        $this->table .= "</tbody>";

        return $this;
    }

    public function addTdButton(array $buttons): self
    {
        $this->table .= "<td>";
        foreach ($buttons as $key) {
            $color = $key['color'];
            $url = $key['path'];
            $name = $key['name'];

            $this->table .= "<a class='btn btn-$color mx-1' href='$url'> $name </a>";
        }
        $this->table .= "</td>";

        return $this;
    }

    public function endTable()
    {
        $this->table .= "</table>";

        return $this;
    }
}
