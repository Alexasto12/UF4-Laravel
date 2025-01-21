import { Component } from '@angular/core';
import { IAutor } from '../interfaces/iautor';

@Component({
  selector: 'app-autor-list',
  standalone: false,
  
  templateUrl: './autor-list.component.html',
  styleUrl: './autor-list.component.css'
})
export class AutorListComponent {
  titolLlistat = 'Llistat d\'autors';
  autors: IAutor[] = [{id:1,nom:'Albert', cognoms:'Sánchez Piñol', imatge:null}, {id:2,nom:'Alejandro', cognoms:'Cabrera Carraasco', imatge:null}, {id:3,nom:'Jordi', cognoms:'Sierra i Fabra', imatge:null}];

}
