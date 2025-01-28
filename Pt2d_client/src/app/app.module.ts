import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from "@angular/forms"
import { BrowserModule, provideClientHydration, withEventReplay } from '@angular/platform-browser';
import { provideHttpClient } from '@angular/common/http'; // Add this import
import { CommonModule } from '@angular/common';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { AutorListComponent } from './autor-list/autor-list.component';
import { WelcomeComponent } from './welcome/welcome.component';
import { LlibresListComponent } from './llibres-list/llibres-list.component';
import { AutorListFilterPipe } from './autor-list/autor-list-filter.pipe';
import { LlibreCreateComponent } from './llibre-create/llibre-create.component';
import { AutorCreateComponent } from './autor-create/autor-create.component';


@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    AutorListComponent,
    WelcomeComponent,
    LlibresListComponent,
    AutorListFilterPipe,
    LlibreCreateComponent,
    AutorCreateComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    CommonModule
  ],
  providers: [
    provideClientHydration(withEventReplay()),
    provideHttpClient()
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
