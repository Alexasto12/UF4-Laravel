import { Component, OnInit } from '@angular/core';
import { IAutor } from '../interfaces/iautor';
import { DadesAutorsService } from '../services/dades-autors.service';

@Component({
  selector: 'app-autor-list',
  standalone: false,
  
  templateUrl: './autor-list.component.html',
  styleUrl: './autor-list.component.css'
})
export class AutorListComponent implements OnInit  {
    titolLlistat = 'Llistat d\'autors';
    autors:IAutor[] = [];
    constructor(private autorService: DadesAutorsService){ }
    ngOnInit() {
      //fem servir event de creacio
      console.log("Listat d'autors inicialitzat");
      this.autorService.getDades().subscribe(resp => {
      // accedim al body de la resposta HTTP.
      if (resp.body) {
        this.autors = resp.body;
      }
      });
    }
  
}
