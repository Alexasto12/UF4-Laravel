import { TestBed } from '@angular/core/testing';

import { DadesLlibresService } from './dades-llibres.service';

describe('DadesLlibresService', () => {
  let service: DadesLlibresService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DadesLlibresService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
