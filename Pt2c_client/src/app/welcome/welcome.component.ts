import { Component } from '@angular/core';

@Component({
  selector: 'app-welcome',
  standalone: false,
  
  templateUrl: './welcome.component.html',
  styleUrl: './welcome.component.css'
})
export class WelcomeComponent {
  titol:string = "Benvingut a la web de la nostra biblioteca";
}
