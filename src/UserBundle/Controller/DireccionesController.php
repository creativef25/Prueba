<?php

namespace UserBundle\Controller;

use UserBundle\Entity\Direcciones;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Direccione controller.
 *
 */
class DireccionesController extends Controller
{
    /**
     * Lists all direccione entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $direcciones = $em->getRepository('UserBundle:Direcciones')->findAll();

        return $this->render('direcciones/index.html.twig', array(
            'direcciones' => $direcciones,
        ));
    }

    /**
     * Creates a new direccione entity.
     *
     */
    public function newAction(Request $request)
    {
        $direcciones = new Direcciones();
        $form = $this->createForm('UserBundle\Form\DireccionesType', $direcciones);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direcciones);
            $em->flush($direcciones);

            return $this->redirectToRoute('direcciones_show', array('id' => $direcciones->getId()));
        }

        return $this->render('direcciones/new.html.twig', array(
            'direccione' => $direcciones,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccione entity.
     *
     */
    public function showAction(Direcciones $direccione)
    {
        $deleteForm = $this->createDeleteForm($direccione);

        return $this->render('direcciones/show.html.twig', array(
            'direccione' => $direccione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direccione entity.
     *
     */
    public function editAction(Request $request, Direcciones $direccione)
    {
        $deleteForm = $this->createDeleteForm($direccione);
        $editForm = $this->createForm('UserBundle\Form\DireccionesType', $direccione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('direcciones_edit', array('id' => $direccione->getId()));
        }

        return $this->render('direcciones/edit.html.twig', array(
            'direccione' => $direccione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a direccione entity.
     *
     */
    public function deleteAction(Request $request, Direcciones $direccione)
    {
        $form = $this->createDeleteForm($direccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($direccione);
            $em->flush($direccione);
        }

        return $this->redirectToRoute('direcciones_index');
    }

    /**
     * Creates a form to delete a direccione entity.
     *
     * @param Direcciones $direccione The direccione entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Direcciones $direccione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direcciones_delete', array('id' => $direccione->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
