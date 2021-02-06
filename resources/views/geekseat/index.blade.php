@extends('layouts.master')
@push('css')
    <style>
        .header h1{
            font-weight: 900;
        }

        .rules, .persons{
            text-align: left;
            color: black;
            font-size: 12pt;
            font-weight: 600;
        }
    </style>
@endpush
@section('content')
    <div class="flex-center">
        <div class="content">
            <div class="header title mt-5">
                <h1>The story: Geekseat Witch Saga: Return of The Coder!</h1>
            </div>
            <div class="row">
                <div class="rules">
                    <label for="">Rules :</label>
                    <p>Since the witch is a die hard programmer, she follow a specific rule to decide the number of villagers she should kill each year.</p>
                    <nav>
                        <ul>
                            <li>On the 1st year she kills 1 villager</li>
                            <li>On the 2nd year she kills 1 + 1 = 2 villagers</li>
                            <li>On the 3rd year she kills 1 + 1 + 2 = 4 villagers</li>
                            <li>On the 4th year she kills 1 + 1 + 2 + 3 = 7 villagers</li>
                            <li>On the 5th year she kills 1 + 1 + 2 + 3 + 5 = 12 villagers</li>
                            <li>And so on...</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="persons" id="persons">
                    <div>
                        <label for="">Person 1</label>
                        <div class="form-row data-persons">
                            <div class="form-group col-md-3">
                                <lable>Born on Year</lable>
                                <input type="text" class="form-control" onchange="getYear(this)" onkeyup="getYear(this)" id="age">
                            </div>
                            <div class="form-group col-md-3">
                                <lable>Year of Death</lable>
                                <input type="text" class="form-control" onchange="getYear(this)" onkeyup="getYear(this)" id="year">
                            </div>
                            <div class="form-group col-md-3">
                                <lable>Year</lable>
                                <input disabled id="numberYear" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <lable>People of Killed</lable>
                                <input disabled id="peopleKilled" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <button onclick="addPeople()" id="addPerson" class="btn btn-outline-danger">Add Person</button>
            </div>
            <div class="row mb-5">
                <div class="persons">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Total All Person</label>
                            <input class="form-control" disabled onchange="_subtotal()" onkeyup="_subtotal()" id="totalPerson">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Total Killed</label>
                            <input class="form-control" onchange="_subtotal()" onkeyup="_subtotal()" disabled id="totalKilled">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Average</label>
                            <input class="form-control" onchange="_subtotal()" onkeyup="_subtotal()" disabled id="average">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script> 
    $( document ).ready(function() {
        let persons, count;
        persons = document.querySelectorAll('.data-persons');
        count = persons.length;

        $('#addPerson').on('click',function(){
            persons = document.querySelectorAll('.data-persons');
            count = persons.length;
            $('#totalPerson').val(count);
            subTotal();
        });

        $('#totalPerson').val(count);
        subTotal();
    });

    function fibonacciSum(num){
        const number = parseInt(num);
        let number1 = 0, number2 = 1, nextTerm, sum = 0;
        for (let i = 1; i <= number; i++) {
            nextTerm = number1 + number2;
            number1 = number2;
            number2 = nextTerm;
            
            sum += number1;
        }
        return sum;
    }

    function getYear(ele){
        let total = 0;
        let age = parseInt($(ele).parent().parent().find('#age').val());
        let year = parseInt($(ele).parent().parent().find('#year').val());
        total = year - age;

        if(isNaN(total)){
            $(ele).parent().parent().find('#numberYear').val(0);
        }else{
            if(total < 0){
                $(ele).parent().parent().find('#numberYear').val(-1);
                $(ele).parent().parent().find('#peopleKilled').val("INVALID");
            }else{
                
            $(ele).parent().parent().find('#numberYear').val(total);
            $(ele).parent().parent().find('#peopleKilled').val(fibonacciSum(total));
            }
        }
        subTotal();
    }

    function addPeople()
    {
        let row = `
        <div>
            <label for="">Person 1</label>
            <div class="form-row data-persons">
                <div class="form-group col-md-3">
                    <lable>Born on Year</lable>
                    <input type="text" class="form-control" onchange="getYear(this)" onkeyup="getYear(this)" id="age">
                </div>
                <div class="form-group col-md-3">
                    <lable>Year of Death</lable>
                    <input type="text" class="form-control" onchange="getYear(this)" onkeyup="getYear(this)" id="year">
                </div>
                <div class="form-group col-md-3">
                    <lable>Year</lable>
                    <input disabled id="numberYear" type="text" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <lable>People of Killed</lable>
                    <input disabled id="peopleKilled" type="text" class="form-control">
                </div>
            </div>
        </div>
        `;
        $('#persons').append(row);
        subTotal();
    }

    function subTotal()
    {
        let count, sum = 0;
        count = document.querySelectorAll('#peopleKilled').length;
        
        let persons = document.querySelectorAll('#peopleKilled');
        persons.forEach(function(e){
            sum += parseInt($(e).val());
        });
        
        if(isNaN(sum)){
            $('#totalKilled').val(0);
            $('#average').val(0);
        }else{
            $('#totalKilled').val(sum);
            $('#average').val(sum/parseInt(count));
        }
    }
    </script>
@endpush