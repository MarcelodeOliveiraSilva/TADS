--
-- PostgreSQL database dump
--

-- Dumped from database version 11.8
-- Dumped by pg_dump version 11.8

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    codigo integer NOT NULL,
    nome character varying(30),
    cpf character varying(11)
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- Name: dependente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dependente (
    codigo integer NOT NULL,
    cliente integer NOT NULL,
    nome character varying(30),
    relacao character varying(11)
);


ALTER TABLE public.dependente OWNER TO postgres;

--
-- Name: dependente_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dependente_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dependente_codigo_seq OWNER TO postgres;

--
-- Name: dependente_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dependente_codigo_seq OWNED BY public.dependente.codigo;


--
-- Name: loja_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.loja_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.loja_codigo_seq OWNER TO postgres;

--
-- Name: loja_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.loja_codigo_seq OWNED BY public.cliente.codigo;


--
-- Name: cliente codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN codigo SET DEFAULT nextval('public.loja_codigo_seq'::regclass);


--
-- Name: dependente codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dependente ALTER COLUMN codigo SET DEFAULT nextval('public.dependente_codigo_seq'::regclass);


--
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (codigo);


--
-- Name: dependente dependente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dependente
    ADD CONSTRAINT dependente_pkey PRIMARY KEY (codigo);


--
-- Name: dependente dependente_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dependente
    ADD CONSTRAINT dependente_cliente_fkey FOREIGN KEY (cliente) REFERENCES public.cliente(codigo);


--
-- PostgreSQL database dump complete
--

