import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LlibresListComponent } from './llibres-list.component';

describe('LlibresListComponent', () => {
  let component: LlibresListComponent;
  let fixture: ComponentFixture<LlibresListComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [LlibresListComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LlibresListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
