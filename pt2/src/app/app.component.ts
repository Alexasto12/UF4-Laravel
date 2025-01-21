import { Component } from '@angular/core';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'M7-UF4-Pt2';
    nom = 'Alejandro'
    cognoms = 'Cabrera Carrasco'
    retornarNomCognoms(){
      return this.nom + ' ' + this.cognoms;
    }
  }

