import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { DadesLlibresService } from '../services/dades-llibres.service';
import { HttpErrorResponse } from '@angular/common/http';
import { IAutor } from '../interfaces/iautor';
import { DadesAutorsService } from '../services/dades-autors.service';


@Component({
  selector: 'app-llibre-create',
  standalone: false,
  
  templateUrl: './llibre-create.component.html',
  styleUrl: './llibre-create.component.css'
})
export class LlibreCreateComponent {
  myForm: FormGroup;
  errorMessage: string = '';
  autors: any[] = [];
  constructor(private llibreService: DadesLlibresService, private autorService: DadesAutorsService, private router: Router,  private formBuilder: FormBuilder) { 
    this.myForm = new FormGroup({
    });


    
  }

  ngOnInit() {
    this.myForm = this.formBuilder.group({
      titol: [null],
      dataP: [null],
      vendes: [null],
      autor_id: [null]
    });
    this.autorService.getDades().subscribe({
      next: (data: any) => {
        this.autors = data.body;
      },
      error: (error: HttpErrorResponse) => {
        this.errorMessage = error.message;
        console.error('Error:', error);
      }
    });
    
    
  }
  
  onSubmit(llibre: any) {
    this.llibreService.createLlibre(llibre).subscribe({
      next: (data) => {
       return this.router.navigate(['llibre-list']);
      
      },
      error: (error: HttpErrorResponse) => {
        this.errorMessage = error.message;
        console.error('Error:', error);
        return this.errorMessage;
      }
    });
  }
  
}
  


  
  
  
  













































