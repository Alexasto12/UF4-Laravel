import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutorListComponent } from './autor-list.component';

describe('AutorListComponent', () => {
  let component: AutorListComponent;
  let fixture: ComponentFixture<AutorListComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [AutorListComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AutorListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
