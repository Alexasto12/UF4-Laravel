import { HttpErrorResponse } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { DadesAutorsService } from '../services/dades-autors.service';

@Component({
  selector: 'app-autor-create',
  standalone: false,
  
  templateUrl: './autor-create.component.html',
  styleUrl: './autor-create.component.css'
})
export class AutorCreateComponent {
  myForm: FormGroup;
  errorMessage: string = '';
  constructor(private autorService: DadesAutorsService, private router: Router,  private formBuilder: FormBuilder) { 
    this.myForm = new FormGroup({
    });


    
  }
onFileSelect(event: any) {
  const file: File = event.target.files[0];
  this.myForm.get('imatge')?.setValue(file);
}

  ngOnInit() {
    this.myForm = this.formBuilder.group({
      nom: [null],
      cognoms: [null],
      imatge: [null]
    });
  }
  
  onSubmit(autor: any) {
   const formData = new FormData();
   formData.append('nom', autor.nom);
   formData.append('cognoms', autor.cognoms);
   formData.append('imatge', this.myForm.get('imatge')?.value);
    this.autorService.createAutor(formData).subscribe({
      next: (data: any) => {
       return this.router.navigate(['autor-list']);
      
      },
      error: (error: HttpErrorResponse) => {
        this.errorMessage = error.message;
        console.error('Error:', error);
        return this.errorMessage;
      }
    });
  }
}
