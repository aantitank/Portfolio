<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\BookType;
use AppBundle\Model\Author;
use AppBundle\Model\Book;
use AppBundle\Model\BookQuery;

class BookController extends Controller
{
    /**
     * @Route("/book", name="book_index")
     */
    public function indexAction(Request $request)
    {
        $books = BookQuery::create()->find();

        return $this->render('book/index.html.twig', ['books' => $books]);
    }

    /**
     * @Route("/book/show/{id}", name="book_show")
     */
    public function showAction($id)
    {
        $book = BookQuery::create()->findPk($id);

        if (!$book) {
            throw $this->createNotFoundException('No Book found for id ');
        }

        return $this->render('book/show.html.twig', ['book' => $book]);
    }

    /**
     * @Route("/book/new", name="book_new")
     */
    public function newAction(Request $request)
    {
        $book = new book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book->setTitle($request->get('title'));
            $book->setIsbn($request->get('isbn'));
            $book->save();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
	}

    /**
     * @Route("/book/edit/{id}", name="book_edit")
     */
    public function editAction(Request $request, $id)
    {
        $book = BookQuery::create()->findPk($id);
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book->setTitle($request->get('title'));
            $book->setIsbn($request->get('isbn'));
            $book->save();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/edit.html.twig', [
            'book_id' => $id,
            'form_edit' => $form->createView(),
        ]);
    }

    /**
     * @Route("/book/delete/{id}", name="book_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $book = BookQuery::create()->filterById($id)->find();
        $book->delete();

        return $this->redirectToRoute('book_index');
    }
}
