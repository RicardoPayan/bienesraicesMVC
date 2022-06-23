describe('Prueba la navegacion y routing del header y footer', () => {
  it('Prueba la navegacion del header', () => {
    cy.visit('/');

    cy.get('[data-cy="navegacion-header"]').should('exist');
    cy.get('[data-cy="navegacion-header"]').find('a').should('have.length',4);
    cy.get('[data-cy="navegacion-header"]').find('a').should('not.have.length',6);

    //Revisar que los enlaces sean correcto
    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text','Nosotros');

    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal','/propiedades');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('text','Propiedades');

    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal','/blog');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('text','Blog');

    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('text','Contacto');


  })

  it('Prueba la navegacion del footer', ()=>{
    cy.get('[data-cy="navegacion-footer"]').should('exist');

    cy.get('[data-cy="navegacion-footer"]').should('exist');
    cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length',4);
    cy.get('[data-cy="navegacion-header"]').find('a').should('not.have.length',6);

    //Revisar que los enlaces sean correcto
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('text','Nosotros');

    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal','/propiedades');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('text','Propiedades');

    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal','/blog');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('text','Blog');

    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('text','Contacto');

    cy.get('[data-cy="copyright"]').should('have.prop','class').should('equal','copyright');


  });
})
