describe('Prueba el formulario de contacto', () => {
  it('Prueba la pagina de contacto y el envio de emails', () => {
    cy.visit('/contacto');
    cy.get('[data-cy="heading-contacto"]').should('exist');
    cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto');
    cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal','Formulario de contacto');


    cy.get('[data-cy="heading-formulario"]').should('exist');
    cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el Formulario de Contacto');
    cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal','Llena el formulario');

    cy.get('[data-cy="formulario-contacto"]').should('exist');

  });

  it('Llena los campos del formulario',()=>{
    cy.get('[data-cy="input-nombre"]').type('Ricardo Payan');
    cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa');
    cy.get('[data-cy="input-opciones"]').select('compra');

    cy.get('[data-cy="input-precio"]').type('12345');
    cy.get('[data-cy="forma-contacto"]').eq(1).check();

    cy.wait(1000);

    cy.get('[data-cy="forma-contacto"]').eq(0).check();

    cy.get('[data-cy="input-telefono"]').type('1234567890');
    cy.get('[data-cy="input-fecha"]').type('2022-07-13');
    cy.get('[data-cy="input-hora"]').type('12:45');

    cy.get('[data-cy="formulario-contacto"]').submit();

    cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
    cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal','mensaje enviado correctamente');
    cy.get('[data-cy="alerta-envio-formulario"]').should('have.class','alerta').and('have.class','exito')
        .and('not.have.class','error');



  })
})
